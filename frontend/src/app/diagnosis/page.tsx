// app/diagnosis/page.tsx

async function getQuestions() {
  const res = await fetch(
    `${process.env.NEXT_PUBLIC_API_BASE_URL}/diagnosis/questions`,
    {
      cache: "no-store", // 常に最新を取得（本番確認用）
    }
  );

  if (!res.ok) {
    throw new Error("Failed to fetch questions");
  }

  return res.json();
}

export default async function DiagnosisPage() {
  const questions = await getQuestions();

  return (
    <div className="min-h-screen bg-gray-50 p-8">
      <h1 className="text-3xl font-bold mb-8">推しメン診断</h1>

      {questions.map((q: any) => (
        <div key={q.id} className="mb-10">
          <h2 className="text-xl font-semibold mb-4">
            {q.question_text}
          </h2>

          <div className="space-y-2">
            {q.choices.map((choice: any) => (
              <div
                key={choice.id}
                className="p-3 bg-white rounded shadow"
              >
                {choice.choice_text}
              </div>
            ))}
          </div>
        </div>
      ))}
    </div>
  );
}