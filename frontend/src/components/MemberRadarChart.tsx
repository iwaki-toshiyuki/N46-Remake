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
  color?: string;
};

export function MemberRadarChart({ status, color = "#812990" }: Props) {
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
        <RadarChart data={data} margin={{ top: 20, right: 40, bottom: 20, left: 40 }}>
          <PolarGrid />
          <PolarAngleAxis dataKey="subject" />
          <PolarRadiusAxis
            domain={[0, 5]}
            tick={false}
            axisLine={false}
            tickLine={false}
          />
          <Radar
            name="ステータス"
            dataKey="value"
            stroke={color}
            fill={color}
            fillOpacity={0.6}
          />
        </RadarChart>
      </ResponsiveContainer>
    </div>
  );
}