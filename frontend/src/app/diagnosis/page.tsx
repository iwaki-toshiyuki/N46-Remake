"use client";
import Link from "next/link";
import { useEffect, useState } from "react";

// -----------------------------
// 型定義
// APIレスポンスの形状を明示することで、
// 画面側のデータアクセスを安全に保つ
// -----------------------------

type Choice = {
  id: number;
  choice_text: string;
};

type Question = {
  id: number;
  question_text: string;
  choices: Choice[];
};

// 診断結果として返ってくる member の型
// 将来的にプロフィール画像URLなどが増えてもここに追加するだけ
type Member = {
  id: number;
  name: string;
};

// -----------------------------
// 画面の状態を表す型
// "loading" → "answering" → "submitting" → "result" | "error"
// の一方通行フローを型で表現することで、
// 不正な状態遷移をコンパイルレベルで防ぐ
// -----------------------------
type PageStatus = "loading" | "answering" | "submitting" | "result" | "error";

export default function DiagnosisPage() {
  // -----------------------------
  // 状態管理
  // -----------------------------

  // APIから取得した質問リスト
  const [questions, setQuestions] = useState<Question[]>([]);

  // 現在表示中の質問のインデックス
  // 1問ずつ表示するためにこの値を進めていく
  const [currentIndex, setCurrentIndex] = useState<number>(0);

  // 各質問で選んだ choice_id を順番に蓄積する配列
  const [selectedChoiceIds, setSelectedChoiceIds] = useState<number[]>([]);

  // 診断結果として返ってくる member オブジェクト
  const [result, setResult] = useState<Member | null>(null);

  // ページ全体の状態（UI切り替えの制御に使用）
  const [status, setStatus] = useState<PageStatus>("loading");

  // エラー発生時のメッセージ
  const [errorMessage, setErrorMessage] = useState<string>("");

  // -----------------------------
  // 初回マウント時に質問一覧を取得
  // ローディング中はスピナーを表示し、
  // 失敗時はエラー画面に遷移する
  // -----------------------------
  useEffect(() => {
    const fetchQuestions = async () => {
      try {
        const res = await fetch(
          `${process.env.NEXT_PUBLIC_API_BASE_URL}/diagnosis/questions`
        );

        if (!res.ok) {
          // HTTPエラーは throw しないと catch に入らないため明示的に投げる
          throw new Error(`質問の取得に失敗しました（HTTP ${res.status}）`);
        }

        const data: Question[] = await res.json();
        setQuestions(data);
        setStatus("answering");
      } catch (e) {
        // ネットワークエラーや上記のthrowをここで捕捉
        setErrorMessage(
          e instanceof Error ? e.message : "不明なエラーが発生しました"
        );
        setStatus("error");
      }
    };

    fetchQuestions();
  }, []);

  // -----------------------------
  // 選択肢クリック時の処理
  // 選択 → 自動で次の質問へ遷移、最後なら診断APIを叩く
  // -----------------------------
  const handleSelect = async (choiceId: number) => {
    // 連打防止：選択肢クリック中は何もしない
    if (status !== "answering") return;

    // 今回の choice_id を追加した配列を作成
    // setState の非同期性を避けるため、新しい配列を変数に保持しておく
    const updatedChoiceIds = [...selectedChoiceIds, choiceId];
    setSelectedChoiceIds(updatedChoiceIds);

    const isLastQuestion = currentIndex === questions.length - 1;

    if (isLastQuestion) {
      // 全質問に回答済み → 診断APIへ送信
      await submitDiagnosis(updatedChoiceIds);
    } else {
      // 次の質問へ自動遷移
      setCurrentIndex((prev) => prev + 1);
    }
  };

  // -----------------------------
  // 診断結果をAPIへ送信する処理
  // handleSelect から呼び出されるため、
  // 関数として切り出して責務を分離している
  // -----------------------------
  const submitDiagnosis = async (choiceIds: number[]) => {
    setStatus("submitting");

    try {
      const res = await fetch(
        `${process.env.NEXT_PUBLIC_API_BASE_URL}/diagnosis`,
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          // Laravel側が期待している形式に合わせる
          body: JSON.stringify({ choice_ids: choiceIds }),
        }
      );

      if (!res.ok) {
        throw new Error(`診断に失敗しました（HTTP ${res.status}）`);
      }

      const data: { member: Member } = await res.json();
      setResult(data.member);
      setStatus("result");
    } catch (e) {
      setErrorMessage(
        e instanceof Error ? e.message : "不明なエラーが発生しました"
      );
      setStatus("error");
    }
  };

  // -----------------------------
  // ページをリセットして最初からやり直す
  // -----------------------------
  const handleReset = () => {
    setCurrentIndex(0);
    setSelectedChoiceIds([]);
    setResult(null);
    setStatus("answering");
  };

  // -----------------------------
  // レンダリング
  // status に応じてUIを切り替える
  // -----------------------------

  return (
    <div className="min-h-screen bg-gradient-to-br from-purple-100 to-pink-100 flex flex-col items-center justify-center p-8">
      <h1 className="text-3xl font-bold mb-10 text-pink-600">推しメン診断</h1>

      {/* ローディング（質問取得中 or 診断送信中）*/}
      {(status === "loading" || status === "submitting") && (
        <div className="flex flex-col items-center gap-4">
          {/* アニメーションスピナー */}
          <div className="w-12 h-12 border-4 border-pink-300 border-t-pink-600 rounded-full animate-spin" />
          <p className="text-gray-500">
            {status === "loading" ? "質問を読み込み中…" : "診断中…"}
          </p>
        </div>
      )}

      {/* 質問表示エリア（1問ずつ） */}
      {status === "answering" && questions.length > 0 && (
        <div className="w-full max-w-lg">
          {/* 進捗表示 */}
          <p className="text-sm text-gray-400 mb-2 text-right">
            {currentIndex + 1} / {questions.length}
          </p>

          {/* プログレスバー */}
          <div className="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div
              className="bg-pink-400 h-2 rounded-full transition-all duration-300"
              style={{
                width: `${((currentIndex + 1) / questions.length) * 100}%`,
              }}
            />
          </div>

          {/* 現在の質問 */}
          <h2 className="text-xl font-semibold mb-6 text-gray-800">
            {questions[currentIndex].question_text}
          </h2>

          {/* 選択肢リスト */}
          <div className="space-y-3">
            {questions[currentIndex].choices.map((choice) => (
              <button
                key={choice.id}
                onClick={() => handleSelect(choice.id)}
                className="w-full p-4 bg-white rounded-lg shadow text-left
                           hover:bg-pink-50 hover:shadow-md
                           active:bg-pink-100
                           transition-all duration-150 text-gray-700"
              >
                {choice.choice_text}
              </button>
            ))}
          </div>
        </div>
      )}

      {/* 診断結果表示 */}
      {status === "result" && result && (
        <div className="w-full max-w-lg text-center">
          <div className="p-8 bg-white rounded-2xl shadow-lg">
            <p className="text-gray-500 mb-2">あなたの推しメンは…</p>
            <h2 className="text-3xl font-bold text-pink-600 mt-2">
              {result.name}
            </h2>
          </div>

          {/* もう一度試せるようにリセットボタンを提供 */}
          <div className="mt-8 flex justify-center gap-4">
            <button
              onClick={handleReset}
              className="px-6 py-3 bg-pink-500 text-white rounded-full
                         hover:bg-pink-600 transition-colors duration-150"
            >
              もう一度診断する
            </button>

            {/* トップページに戻る */}
            <Link
              href="/"
              className="px-6 py-3 bg-pink-300 text-white rounded-full
                        hover:bg-pink-400 transition-colors duration-150 inline-block"
            >
              トップページに戻る
            </Link>
          </div>
        </div>
      )}

      {/* エラー表示 */}
      {status === "error" && (
        <div className="w-full max-w-lg text-center">
          <div className="p-6 bg-red-50 border border-red-200 rounded-lg">
            <p className="text-red-600 font-semibold">エラーが発生しました</p>
            <p className="text-red-500 text-sm mt-1">{errorMessage}</p>
          </div>

          {/* ページをリロードして再試行できるようにする */}
          <button
            onClick={() => window.location.reload()}
            className="mt-6 px-6 py-3 bg-gray-500 text-white rounded-full
                       hover:bg-gray-600 transition-colors duration-150"
          >
            再読み込み
          </button>
        </div>
      )}
    </div>
  );
}
