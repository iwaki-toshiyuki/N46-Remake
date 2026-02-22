// src/app/members/page.tsx
import MembersDropdown from "./MembersDropdown";

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

      <div className="mt-8">
        <MembersDropdown members={members} />
      </div>

    </main>
  );
}