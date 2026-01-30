// 環境変数から API のベースURLを取得
// 例: http://localhost:8000/api
const API_BASE_URL = process.env.NEXT_PUBLIC_API_BASE_URL;

// バックエンドの疎通確認用 API（/health）を呼び出す関数
export async function fetchHealth() {
  // fetch を使って Laravel の /health エンドポイントにリクエストを送信
  const res = await fetch(`${API_BASE_URL}/health`);

  // HTTP ステータスが 200 番台以外の場合はエラーとして扱う
  if (!res.ok) {
    throw new Error('API request failed');
  }

  // レスポンスを JSON として返却
  return res.json();
}