import { fetchHealth } from '@/lib/api';

export default async function Home() {
  // バックエンドの /health エンドポイントを呼び出して疎通確認
  const data = await fetchHealth();

  return (
    <main>
      <h1>Frontend</h1>
      <p>API status: {data.status}</p>
    </main>
  );
}