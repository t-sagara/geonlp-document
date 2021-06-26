.. _datamodel_geoword_model:

地名語のデータ項目一覧
======================

.. csv-table:: 地名語のデータ項目
   :header: "フィールド名", "日本語名", ":ref:`datamodel_required_types`", "型，値の範囲", "例", "注"

   ":ref:`datamodel_geoword_identifiers`"
   "geolod_id", "GeoLOD ID", "ServerGenerated", "6文字以上の文字列", "'yJXDP7'"
   "entry_id",  "エントリID", "Required", "1文字以上の文字列", "'sf15'"
   ":ref:`datamodel_geoword_notations`"
   "body", "原型", "Required", "1～255文字の文字列", "札幌"
   "prefix", "接頭辞", "Recommended", "0～255文字の文字列", "''", "複数可"
   "suffix", "接尾辞", "Recommended", "0～255文字の文字列", "'飛行場/空港'", "複数可"
   "body_kana", "読み", "Recommended", "0～255文字の文字列", "'さっぽろ'"
   "prefix_kana", "接頭辞読み", "Extended", "0～255文字の文字列", "''", "複数可"
   "suffix_kana", "接尾辞読み", "Extended", "0～255文字の文字列", "'ひこうじょう/くうこう'", "複数可"
   ":ref:`datamodel_geoword_relations`"
   "ne_class", "固有名クラス", "Required", ":ref:`class_list` から選択", "'航空施設/空港'", "不明な場合は''"
   "hypernym", "上位語", "Recommended", "0～255文字の文字列", "'北海道/札幌市/東区'", "複数可"
   ":ref:`datamodel_geoword_attributes`"
   "latitude", "代表点緯度", "Required", "0～32文字の文字列", "'43.1175'"
   "longitude", "代表点経度", "Required", "0～32文字の文字列", "'141.381389'"
   "address", "住所", "Recommended", "0～255文字の文字列", "'札幌市東区丘珠町'"
   "code", "コード", "Extended", "0～255文字の文字列", "'IATA:OKD/ICAO:RJCO'", "複数可"
   "valid_from", "有効期間（開始）", "Extended", "日付文字列または空", "'1942-09'"
   "valid_to", "有効期間（終了）", "Extended", "日付文字列または空", "''"

必須種別
--------

*ServerGenerated* （サーバ生成）
  - GeoLOD サイトにアップロードすると自動的に計算、付与される項目
  - アップロードするデータをユーザが作成する場合には省略してかまいません

*Required* （必須）
  - GeoNLP の目的のために必要な項目
  - アップロードする前のデータにも用意する必要があります
  - 0文字以上の文字列が認められる場合は空文字列でも構いませんが、項目は用意してください

*Recommended* （推奨）
  - 実用的な精度を得るために整備することが望ましい項目
  - 省略してもエラーにはなりませんが、GeoNLP の機能が十分に活用できない可能性があります

*Extended* （拡張）
  - 多くの地名語に共通に整備可能な項目
  - 整備することで GeoNLP の機能を細かく制御することができます
