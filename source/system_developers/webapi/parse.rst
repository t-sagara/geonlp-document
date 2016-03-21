.. _webapi_parse:

================================================
parse
================================================


説明
---------------------------------------

parse は自然言語文を解析し、地名語を抽出した結果を返すジオパース処理を行う。

文法
---------------------------------------

object **geonlp.parse** (string *sentence* [, object *options*])

object **geonlp.parse** (string[] *sentences* [, object *options*])

リクエストパラメータ
---------------------------------------

*sentence*
  - 変換したいテキスト
  - 長さの上限なし

*sentences*
  - 変換したいテキストの配列
  - 要素の長さ、要素数の上限なし
  - それぞれの要素は独立したテキストの集合として解析され、地名解決に影響しない
  - parse を繰り返し呼び出す代わりにまとめて処理するために用いる

*options*
  - 利用する辞書の指定など、処理のオプションを設定する
  - オプションの詳細は :ref:`webapi_parse_option` を参照

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  {
    "method": "geonlp.parse",
    "params":
      [
        "NIIは千代田区一ツ橋２－１－２にあります。神保町から徒歩3分。",
        { "geocoding":true, "threshold":0 }
      ],
    "id": "1"
  }

レスポンス
---------------------------------------

処理結果の構造化テキストを返す。

レスポンスの形式は、 :ref:`webapi_parse_option` の "geojson" が true
にセットされている場合は
:ref:`webapi_response_feature_collection` を、未指定または false がセットされている場合は :ref:`webapi_response_feature_array` に従う。
