// src/app/members/page.tsx

type Member = {
  id: number;
  name: string;
  nickname: string;
  generation: number;
  birthday: string;
  image_url: string | null;
  description: string;
};

async function getMembers(): Promise<Member[]> {
  const res = await fetch(
    `${process.env.NEXT_PUBLIC_API_BASE_URL}/members`,
    {
      cache: "no-store", // 常に最新を取得（本番確認用）
    }
  );

  if (!res.ok) {
    throw new Error("Failed to fetch members");
  }

  return res.json();
}

export default async function MembersPage() {
  const members = await getMembers();

  return (
    <main className="min-h-screen bg-gradient-to-br from-purple-100 to-pink-100 px-6 py-20">

      <h1 className="text-3xl font-bold text-fuchsia-700 mb-8">メンバー一覧</h1>

      <a
        href="/"
        className="group bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden"
      >
        <div className="p-4 ">
          <p className="text-sm font-medium text-gray-500 group-hover:text-gray-900">
            戻る
          </p>
        </div>
      </a>

      <div className="grid md:grid-cols-3 gap-6">
        {members.map((member) => (
          <div
            key={member.id}
            className="bg-white rounded-xl shadow p-6"
          >
            <h2 className="text-xl font-semibold">
              {member.name}
            </h2>

            <p className="text-sm text-gray-500">
              ニックネーム：{member.nickname}
            </p>

            <p className="text-sm">
              {member.generation}期生
            </p>

            <p className="text-sm">
              誕生日：{member.birthday}
            </p>

            <p className="mt-3 text-sm text-gray-600">
              {member.description}
            </p>
          </div>
        ))}
      </div>

    </main>
  );
}