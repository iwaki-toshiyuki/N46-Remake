"use client";

import { useRouter } from "next/navigation";

// メンバーの型定義（一覧表示に必要な項目のみ）
type Member = {
  id: number;
  name: string;
  generation: number;
};

// 親コンポーネントから members 配列を受け取る
type Props = {
  members: Member[];
};

export default function MembersDropdown({ members }: Props) {
  const router = useRouter();

  // generation（期）ごとにメンバーをグループ化する
  const grouped = members.reduce<Record<number, Member[]>>((acc, member) => {
    if (!acc[member.generation]) {
      acc[member.generation] = [];
    }
    acc[member.generation].push(member);
    return acc;
  }, {});

  // 期を昇順に並び替え
  const generations = Object.keys(grouped)
    .map(Number)
    .sort((a, b) => a - b);

  return (
    <div className="grid md:grid-cols-2 gap-6">
      {generations.map((gen) => (
        <div key={gen} className="bg-white rounded-2xl shadow-md p-6">
          {/* 期ごとの見出し */}
          <h2 className="text-xl font-bold text-fuchsia-700 mb-4">
            {gen}期生
          </h2>

          {/* メンバー選択用プルダウン */}
          <select
            className="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 bg-white"
            defaultValue=""
            onChange={(e) => {
              // メンバーが選択されたら詳細ページへ遷移
              if (e.target.value) {
                router.push(`/members/${e.target.value}`);
              }
            }}
          >
            <option value="" disabled>
              メンバーを選択してください
            </option>

            {/* 該当期のメンバー一覧を表示 */}
            {grouped[gen].map((member) => (
              <option key={member.id} value={member.id}>
                {member.name}
              </option>
            ))}
          </select>
        </div>
      ))}
    </div>
  );
}