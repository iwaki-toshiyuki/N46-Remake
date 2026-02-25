// src/app/members/page.tsx
import MembersDropdown from "./MembersDropdown";

export const revalidate = 3600; // 🔥 1時間キャッシュ

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
  );

  if (!res.ok) {
    throw new Error("Failed to fetch members");
  }

  return res.json();
}

export default async function MembersPage() {
  const members = await getMembers();

  return (
    <main className="min-h-screen bg-gradient-to-br from-purple-100 to-pink-100 px-4 sm:px-6 py-12 md:py-20">

      <div className="max-w-6xl mx-auto">
        <h1 className="text-2xl sm:text-3xl font-bold text-fuchsia-700 mb-6 md:mb-8">メンバー一覧</h1>

        <a
          href="/"
          className="group bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden inline-block"
        >
          <div className="p-4">
            <p className="text-sm font-medium text-fuchsia-700 group-hover:text-fuchsia-900">
              トップページに戻る
            </p>
          </div>
        </a>

        <div className="mt-6 md:mt-8">
          <MembersDropdown members={members} />
        </div>
      </div>

    </main>
  );
}