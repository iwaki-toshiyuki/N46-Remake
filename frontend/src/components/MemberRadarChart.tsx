// メンバーのステータスをレーダーチャートで表示するコンポーネント
"use client";

import {
  Radar,
  RadarChart,
  PolarGrid,
  PolarAngleAxis,
  PolarRadiusAxis,
  ResponsiveContainer,
} from "recharts";

type Props = {
  status: {
    visual: number;
    singing: number;
    dancing: number;
    variety: number;
    leadership: number;
  };
};

export function MemberRadarChart({ status }: Props) {
  const data = [
    { subject: "ビジュアル", value: status.visual },
    { subject: "歌唱力", value: status.singing },
    { subject: "ダンス", value: status.dancing },
    { subject: "バラエティ", value: status.variety },
    { subject: "リーダー", value: status.leadership },
  ];

  return (
    <div className="w-full h-80">
      <ResponsiveContainer>
        <RadarChart data={data}>
          <PolarGrid />
          <PolarAngleAxis dataKey="subject" />
          <PolarRadiusAxis domain={[0, 5]} />
          <Radar
            name="ステータス"
            dataKey="value"
            stroke="#ec4899"
            fill="#ec4899"
            fillOpacity={0.6}
          />
        </RadarChart>
      </ResponsiveContainer>
    </div>
  );
}