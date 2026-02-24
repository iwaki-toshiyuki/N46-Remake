
import Link from "next/link";
import { MemberRadarChart } from "@/components/MemberRadarChart";


// メンバーの詳細情報の型定義
export type MemberStatus = {
  visual: number;
  singing: number;
  dancing: number;
  variety: number;
  leadership: number;
};

// メンバーの基本情報とステータスを含む型定義
export type Member = {
  id: number;
  name: string;
  nickname: string;
  generation: number;
  birthday: string;
  description: string;
  status: MemberStatus;
};

// 期生ごとのカラーテーマ（乃木坂カラー #812990 を軸に展開）
const generationTheme: Record<number, {
  hero: string;
  bg: string;
  title: string;
  border: string;
  link: string;
  chart: string;
}> = {
  3: {
    hero: "bg-linear-to-r from-[#2d0a3e] to-[#5c1d82]",
    bg: "bg-linear-to-br from-[#f8f0fb] to-[#f2e4f8]",
    title: "text-[#5c1d82]",
    border: "border-[#d4a8e8]",
    link: "text-[#5c1d82] hover:text-[#2d0a3e]",
    chart: "#5c1d82",
  },
  4: {
    hero: "bg-linear-to-r from-[#5c1d82] to-[#812990]",
    bg: "bg-linear-to-br from-[#f4e6f7] to-[#ece0f4]",
    title: "text-[#812990]",
    border: "border-[#c990da]",
    link: "text-[#812990] hover:text-[#5c1d82]",
    chart: "#812990",
  },
  5: {
    hero: "bg-linear-to-r from-[#812990] to-[#a33bb5]",
    bg: "bg-linear-to-br from-[#f0ddf6] to-[#e5ccf0]",
    title: "text-[#a33bb5]",
    border: "border-[#c07cd4]",
    link: "text-[#a33bb5] hover:text-[#812990]",
    chart: "#a33bb5",
  },
  6: {
    hero: "bg-linear-to-r from-[#a33bb5] to-[#c865d4]",
    bg: "bg-linear-to-br from-[#ecd6f5] to-[#e0c4ed]",
    title: "text-[#9b3caa]",
    border: "border-[#b870c8]",
    link: "text-[#9b3caa] hover:text-[#a33bb5]",
    chart: "#c865d4",
  },
};

const defaultTheme = {
  hero: "bg-linear-to-r from-[#5c1d82] to-[#812990]",
  bg: "bg-linear-to-br from-[#f4e6f7] to-[#ece0f4]",
  title: "text-[#812990]",
  border: "border-[#c990da]",
  link: "text-[#812990] hover:text-[#5c1d82]",
  chart: "#812990",
};

// メンバーの詳細を取得する関数
async function getMember(id: string): Promise<Member> {
  const res = await fetch(
    `${process.env.NEXT_PUBLIC_API_BASE_URL}/members/${id}`,
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
  params: Promise<{ id: string }>;
}) {
  const { id } = await params;
  const member = await getMember(id);
  const theme = generationTheme[member.generation] ?? defaultTheme;

  return (
    <main className={`min-h-screen ${theme.bg}`}>
      {/* ヒーローエリア */}
      <div className={`${theme.hero} text-white py-16 px-6`}>
        <div className="max-w-4xl mx-auto flex flex-col items-center text-center gap-4">
          <span className="inline-block bg-white/20 text-white text-sm font-semibold px-4 py-1 rounded-full tracking-widest">
            {member.generation}期生
          </span>
          <h1 className="text-4xl md:text-5xl font-bold tracking-wide">{member.name}</h1>
          <p className="text-white/80 text-lg">&ldquo;{member.nickname}&rdquo;</p>
        </div>
      </div>

      {/* コンテンツエリア */}
      <div className="max-w-4xl mx-auto px-6 py-12">
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {/* プロフィール情報 */}
          <div className={`bg-white rounded-2xl shadow-sm border ${theme.border} p-8 flex flex-col gap-6`}>
            <h2 className={`text-lg font-bold ${theme.title} border-b ${theme.border} pb-3`}>
              プロフィール
            </h2>
            <div className="flex flex-col gap-4">
              <div>
                <p className="text-xs text-gray-400 uppercase tracking-widest mb-1">ニックネーム</p>
                <p className="text-gray-700 font-medium">{member.nickname}</p>
              </div>
              <div>
                <p className="text-xs text-gray-400 uppercase tracking-widest mb-1">誕生日</p>
                <p className="text-gray-700 font-medium">{member.birthday}</p>
              </div>
              <div>
                <p className="text-xs text-gray-400 uppercase tracking-widest mb-1">期生</p>
                <p className="text-gray-700 font-medium">{member.generation}期生</p>
              </div>
            </div>
            <div className="mt-2">
              <p className="text-xs text-gray-400 uppercase tracking-widest mb-2">プロフィール</p>
              <p className="text-gray-600 leading-relaxed text-sm">{member.description}</p>
            </div>
          </div>

          {/* ステータス */}
          <div className={`bg-white rounded-2xl shadow-sm border ${theme.border} p-8 flex flex-col gap-6`}>
            <h2 className={`text-lg font-bold ${theme.title} border-b ${theme.border} pb-3`}>
              ステータス
            </h2>
            <div className="flex items-center justify-center">
              <MemberRadarChart status={member.status} color={theme.chart} />
            </div>
          </div>
        </div>

        <div className="mt-10 flex flex-col items-center gap-4">
          {/* メンバー一覧に戻る */}
          <Link
            href="/members"
            className="px-6 py-3 bg-red-300 text-white rounded-full
                      hover:bg-red-400 transition-colors duration-150
                      inline-block"
          >
            メンバー一覧に戻る
          </Link>

          {/* 診断画面に戻る */}
          <Link
            href="/diagnosis"
            className="px-6 py-3 bg-blue-300 text-white rounded-full
                      hover:bg-blue-400 transition-colors duration-150
                      inline-block"
          >
            診断画面に戻る
          </Link>
        </div>
      </div>
    </main>
  );
}
