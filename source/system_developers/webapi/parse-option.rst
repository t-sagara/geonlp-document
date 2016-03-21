.. _webapi_parse_option:

================================================
parse オプション
================================================

:ref:`webapi_parse`, :ref:`webapi_parseStructured`
などのメソッドでは、オプションパラメータを指定することでジオコーディング処理を無効にしたり、
パース処理に利用する辞書を実行時に制限することができる。

指定したオプションはその時だけ有効で、次回以降の parse 処理には影響しない。

オプション一覧
---------------------------------------------

オプションで利用可能なキーとその意味は以下の通り。

geojson (version 1.2.0)
+++++++++++++++++++++++++++++++++++++++++++++

:name: geojson
:type: bool
:default: false
:例: "geojson":true

レスポンスを GeoJSON の FeatureCollection 型に変更する。

*false* を指定した場合、 :ref:`webapi_response_feature_array` を返す。

*true* を指定した場合、 :ref:`webapi_response_feature_collection` を返す。

show-candidate
+++++++++++++++++++++++++++++++++++++++++++++

:name: show-candidate
:type: bool
:default: false
:例: "show-candidate":true

同綴地名が存在する場合、候補となる地名語を全て表示するかどうかを指定する。ジオコーダを利用している場合には、このオプションにより、候補となる住所を全て表示するかどうかも指定できる。

*false* を指定した場合、最も確度の高い地名語のみ表示する。

*true* を指定した場合、全ての地名語候補を表示する。

show-score
+++++++++++++++++++++++++++++++++++++++++++++

:name: show-score
:type: bool
:default: false
:例: "show-score":true

地名解決の際に内部的に付与された「スコア」をレスポンスに含めるかどうかを指定する。 *threshold* オプションのしきい値を決める際などに利用する。

*false* を指定した場合、スコアは含まれない。

*true* を指定した場合、スコアが含まれる。

geocoding
+++++++++++++++++++++++++++++++++++++++++++++

:name: geocoding
:type: bool | string
:default: "normal"
:例: "geocoding":false, "geocoding":"full"

ジオコーダの有効、無効および出力結果の細かさを指定する。

*false* または *"none"* を指定した場合、ジオコーダを無効にする。

*"minimum"* を指定した場合、ジオコーダを有効にし、最小限の結果を返す。

*true* または *"normal"* を指定した場合、ジオコーダを有効にし、
住所に含まれる地名語の *geonlp_id* を結果に含める。

*"full"* を指定した場合、ジオコーダを有効にし、
住所に含まれる地名語の全ての属性（ *geonlp_id* を含む）を結果に含める。

ジオコーダを無効にした場合、住所文字列に含まれる地名語はそれぞれ個別の
地名語として抽出される。

adjunct
+++++++++++++++++++++++++++++++++++++++++++++

:name: adjunct
:type: bool
:default: false
:例: "adjunct":true

地名修飾語（「喜多方ラーメン」の「喜多方」など）
を地名として抽出するか否かを指定する（true の時抽出）。

地名修飾語かどうかの判断は、地名語の直後の品詞によって決定する。
たとえば一般名詞が後続した場合には地名修飾語とする。

threshold
+++++++++++++++++++++++++++++++++++++++++++++

:name: threshold
:type: int
:default: 0
:例: "threshold":0

地名語を抽出する際のしきい値を指定する。
小さいほど抽出されやすく、0を指定した場合は、地名語の可能性のある候補が全て抽出される。
たとえば「川崎」のような地名語は、
threshold がデフォルト値の場合には、周辺の地名語（「神奈川」「横浜」など）が出現しない限り、
地名語として抽出されないが、threshold を下げることによって抽出することができる。

しかし人名の姓だけが出現している場合などにも地名語として誤抽出されてしまう可能性が高くなる。

set-dic
+++++++++++++++++++++++++++++++++++++++++++++

:name: set-dic
:type: int[]
:default: []
:例: "set-dic":[1,2,3]（辞書id=1,2,3の辞書だけを利用）
     "set-dic":[]（すべての辞書を利用）

特定の辞書だけを利用したい場合、その辞書のidの配列を指定すると、
指定した辞書だけを利用する。デフォルトの設定によらない。

空の配列を指定すると全辞書を利用する。

add-dic
+++++++++++++++++++++++++++++++++++++++++++++

:name: add-dic
:type: int[]
:default: []
:例: "add-dic":[41,42]（辞書id=41,42,3の辞書を追加）

デフォルトの設定で利用されない辞書を一時的に利用したい場合、
その辞書のidの配列を指定する。

remove-dic
+++++++++++++++++++++++++++++++++++++++++++++

:name: remove-dic
:type: int[]
:default: []
:例: "remove-dic":[3,4]（辞書id=3,4の辞書を利用しない）

デフォルトの設定で利用される辞書を一時的に利用したくない場合、
その辞書のidの配列を指定する。
`set-dic` や `add-dic` と同じ id が指定された場合、
`remove-dic` が優先される（つまりその辞書は利用されない）。


set-class
+++++++++++++++++++++++++++++++++++++++++++++

:name: set-class
:type: string[]
:default: []
:例: "set-class":["State.*", "City.*"]

特定の固有名クラスだけを対象としたい場合、そのクラス名の正規表現の配列を指定する。
デフォルトの設定によらない。

正規表現は「クラス名に含まれているパターン」ではなく、
「クラス名と一致するパターン」を指定しなければならない。
たとえば "Station.*" は "SubwayStation" とは一致しないので、
"SubwayStation" も対象としたいのであれば ".*Station.*" と指定する。

空の配列を指定すると固有名クラスのチェックを行わない。
全てのクラスを対象とする場合には ".*" を指定するより、
空の配列を指定した方が高速に処理できる。

add-class
+++++++++++++++++++++++++++++++++++++++++++++

:name: add-class
:type: string[]
:default: []
:例: "add-class":["Hospital"]（"Hospital"という固有名クラスを利用する）

デフォルトの設定で利用されない固有名クラスを一時的に利用したい場合、
そのクラス名の正規表現の配列を指定する。

remove-class
+++++++++++++++++++++++++++++++++++++++++++++

:name: remove-class
:type: string[]
:default: []
:例: "remove-class":["PoliceStation", "FireStation"]（"PoliceStation",
     "FireStation"という固有名クラスを利用しない）

デフォルトの設定で利用される固有名クラスを一時的に利用したくない場合、
そのクラス名の正規表現の配列を指定する。
`set-class` や `add-class` に含まれる正規表現が指定された場合、
`remove-class` が優先される（つまりその固有名クラスは利用されない）。

たとえば全ての「駅」を対象に追加したいが「警察署」「消防署」は対象としたくない場合、
"add-class":[".*Station.*"], "remove-class":["PoliceStation", "FireStation"] と書く。

dist-server (Ver 1.0.9)
+++++++++++++++++++++++++++++++++++++++++++++

:name: dist-server
:type: JSON-RPC Request Object
:default: null
:例: :ref:`dist_server` を参照

地理的な関心の重み分布情報を持つ外部サーバに「重み」を問い合わせ、同綴地名を解決する際に「より関係の深い地名」を選択する。

（例1）関東地方に関係がある文書を処理していることが分かっていれば、外部サーバで「関東地方内部なら1、外部なら0」を返すことで関東地方の外部に同綴地名が存在しても選択されなくなる。

（例2）熱中症に関する記事を処理するならば、気温の分布に基づく熱中症発生確率を外部サーバから返すことで、気温が特に高かった地域の地名が優先的に選択される。


.. _webapi_parse_option_geotime_filter:

時空間フィルタ
---------------------------------------------

バージョン 1.2.0 以降では、時空間フィルタ機能を利用できる。時空間フィルタ機能は、空間的範囲（GeoJSON ポリゴンで指定）および期間（開始年月日と終了年月日で指定）をパラメータとして、その範囲・期間に含まれる（または、含まれない）地名語だけを検出する。

利用可能なキーとその意味は以下の通り。

geo-contains
+++++++++++++++++++++++++++++++++++++++++++++

:name: geo-contains
:type: :ref:`webapi_parse_option_geotime_filter_geojson_parameter`
:default: null
:例: "geo-contains": { "type": "Feature", "geometry":{ "type": "Polygon", "coordinates": [[ [139.457008, 35.513569], [140.011817, 35.513569], [140.011817, 36.030563], [139.457008, 36.030563] ]]}, "properties": {"prop0": "東京近郊" }}

パラメータで指定したポリゴン領域のいずれかに含まれる地名語のみを検出対象とする。

上の例では、東京近郊の四角形ポリゴンで表現された領域に含まれる地名語だけが検出される。

:ref:`software_install` 時に GDAL を利用しなかった場合は例外を発生して終了するが、環境変数 GEONLP_IGNORE_ERROR に YES がセットされている場合は単に無視される。

geo-disjoint
+++++++++++++++++++++++++++++++++++++++++++++

:name: geo-disjoint
:type: :ref:`webapi_parse_option_geotime_filter_geojson_parameter`
:default: null
:例: "geo-disjoint": { "type": "Feature", "geometry":{ "type": "Polygon", "coordinates": [[ [139.457008, 35.513569], [140.011817, 35.513569], [140.011817, 36.030563], [139.457008, 36.030563] ]]}, "properties": {"prop0": "東京近郊" }}

パラメータで指定したポリゴン領域のいずれかにも含まれない地名語のみを検出対象とする。

上の例では、東京近郊の四角形ポリゴンで表現された領域に含まれる地名語は検出されない。

:ref:`software_install` 時に GDAL を利用しなかった場合は例外を発生して終了するが、環境変数 GEONLP_IGNORE_ERROR に YES がセットされている場合は単に無視される。

time-exists
+++++++++++++++++++++++++++++++++++++++++++++

:name: time-exists
:type: :ref:`webapi_parse_option_geotime_filter_time_parameter`
:default: null
:例: "time-exists":"2016-02-29"

パラメータで指定した年月日に存在した地名語のみを検出対象とする。パラメータが期間の場合はエラー。

time-before
++++++++++++++++++++++++++++++++++++++++++++

:name: time-before
:type: :ref:`webapi_parse_option_geotime_filter_time_parameter`
:default: null
:例: "time-before":"2016-02-29"

パラメータで指定した年月日より以前（指定した日を含む）に存在した地名語のみを検出対象とする。パラメータが期間の場合、開始年月日で判定する（期間内に発生した地名は対象とならない）。指定した年月日より前に消滅していても対象となる。

time-after
++++++++++++++++++++++++++++++++++++++++++++

:name: time-after
:type: :ref:`webapi_parse_option_geotime_filter_time_parameter`
:default: null
:例: "time-after":"2016-02-29"

パラメータで指定した年月日より以降（指定した日を含む）に存在した地名語のみを検出対象とする。パラメータが期間の場合、終了年月日で判定する（期間内に消滅した地名は対象とならない）。指定した年月日より後に発生していても対象となる。

time-overlaps
++++++++++++++++++++++++++++++++++++++++++++

:name: time-overlaps
:type: :ref:`webapi_parse_option_geotime_filter_time_parameter`
:default: null
:例: "time-overlaps":["2015-01-01", "2015-12-31"]

パラメータで指定した期間（開始年月日、終了年月日を含む）に、一度でも存在していた地名語のみを検出対象とする。期間内に発生、消滅しても対象となる。パラメータが１つの年月日の場合、 time-exists と同じ。

time-contains
++++++++++++++++++++++++++++++++++++++++++++

:name: time-contains
:type: :ref:`webapi_parse_option_geotime_filter_time_parameter`
:default: null
:例: "time-contains":["2015-01-01", "2015-12-31"]

パラメータで指定した期間（開始年月日、終了年月日を含む）内に発生し、かつ消滅した地名語のみを検出対象とする。開始年月日より前から存在していたり、終了年月日以降も存在した場合は対象とならない。


.. _webapi_parse_option_geotime_filter_geojson_parameter:

空間的範囲パラメータ
+++++++++++++++++++++++++++++++++++++++++++++

空間的範囲パラメータには、以下のいずれかの値が利用できる。

- Polygon 型 GeoJSON ファイルへの URI （URL またはファイルパス）
- Polygon を含む GeoJSON オブジェクト（Polygon 以外のレイヤは無視される）
- 上記を1つ以上含む配列

.. _webapi_parse_option_geotime_filter_time_parameter:

期間パラメータ
+++++++++++++++++++++++++++++

期間パラメータには、以下のいずれかの値が利用できる。

- "YYYY-MM-DD" 形式の年月日文字列
- "YYYY-MM-DD" 形式の年月日文字列を1つ含む配列
- "YYYY-MM-DD" 形式の年月日文字列を2つ含む配列

例：

- "2016-02-29"  2016年2月29日を表す
- ["2016-01-01"] 2016年1月1日を表す
- ["2015-01-01", "2015-12-31"] 2015年1月1日から12月31日までの期間を表す
