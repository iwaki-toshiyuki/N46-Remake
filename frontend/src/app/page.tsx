import { fetchHealth } from '@/lib/api';


export default async function Home() {

  return (
   <main className="min-h-screen bg-gradient-to-br from-purple-100 to-pink-100 px-6 py-20">
      
      <div className="max-w-6xl mx-auto text-center mb-16">
        <h1 className="text-5xl font-bold text-fuchsia-700 mb-6">
          N46 Remake
        </h1>

        <p className="text-lg text-gray-700">
          次の推しメンを見つけよう。
        </p>
      </div>

      <div className="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">

        {/* メンバー一覧カード */}
        <a
          href="/members"
          className="group bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden"
        >
          <div className="h-48 bg-gradient-to-r from-purple-400 to-purple-600"></div>

          <div className="p-8 text-left">

            <h2 className="text-2xl font-semibold text-gray-800 group-hover:text-purple-600 transition">
              メンバー一覧を見る
            </h2>

            <p className="text-gray-600 mt-3 text-sm">
              メンバーのプロフィールやステータスを確認できます。
            </p>
          </div>
        </a>

        {/* 診断カード */}
        <a
          href="/diagnosis"
          className="group bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden"
        >
          <div className="h-48 bg-gradient-to-r from-pink-400 to-pink-600"></div>

          <div className="p-8 text-left">

            <h2 className="text-2xl font-semibold text-gray-800 group-hover:text-pink-600 transition">
              推しメン診断を始める
            </h2>

            <p className="text-gray-600 mt-3 text-sm">
              質問に答えてあなたに合う推しメンを見つけましょう。
            </p>
          </div>
        </a>

      </div>
    </main>
  );
}