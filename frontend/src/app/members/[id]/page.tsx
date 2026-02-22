
import Link from "next/link";

type Member = {
  id: number;
  name: string;
  nickname: string;
  generation: number;
  birthday: string;
  description: string;
};

// メンバーの詳細を取得する関数
async function getMember(id: string): Promise<Member> {
    // APIエンドポイントからメンバーの詳細を取得
  const res = await fetch(
    `http://127.0.0.1:8000/api/members/${id}`,
    { cache: "no-store" }
  );

  if (!res.ok) {
    throw new Error("Failed to fetch member");
  }

  return res.json();
}

// メンバー詳細ページコンポーネント
export default async function MemberDetail({
  params,
}: {
  params: { id: string };
}) {
  // URLパラメータからメンバーIDを取得
  const { id } = await params;

  // メンバーの詳細情報をAPIから取得
  const member = await getMember(id);


return (
        <main className="min-h-screen bg-gradient-to-br from-purple-100 to-pink-100 px-6 py-20">
            <h1 className="text-3xl font-bold text-fuchsia-700 mb-8">メンバー詳細</h1>
            <div>
                <p>{member.name}</p>
                <p>ニックネーム：{member.nickname}</p>
                <p>{member.generation}期生</p>
                <p>誕生日：{member.birthday}</p>
                <p>{member.description}</p>
                <Link 
                    href="/members"
                    className="text-blue-600 hover:underline">
                    メンバー一覧に戻る
                </Link>
            </div>
        </main>
    );
}