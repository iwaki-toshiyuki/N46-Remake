// メンバーのステータスを星評価で表示するコンポーネント(使用していない)

type StarProps = {
  label: string;
  value: number;
};

export function StarRating({ label, value }: StarProps) {
  return (
    <div className="flex items-center gap-3">
      <span className="w-32 font-semibold">{label}</span>
      <span>
        {[1, 2, 3, 4, 5].map((star) => (
          <span key={star}>
            {star <= value ? "★" : "☆"}
          </span>
        ))}
      </span>
    </div>
  );
}