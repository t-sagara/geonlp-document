.. _webapi_parse:

================================================
parse
================================================

バージョン1.1.0 以前の説明は :ref:`webapi_parse_110` へ。

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
構造化テキストは、地名語以外の文字列はジオメトリに null を、地名語部分は Point 型のジオメトリをもつ複数の GeoJSON オブジェクトから構成された、1つのフィーチャーコレクションオブジェクト。

地名語を含む GeoJSON オブジェクトは、 properties メンバーに :ref:`json_geoword` か :ref:`json_address` を持つ。地名語ではない場合、properties には元の文章中の文字列が含まれる。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++

.. literalinclude:: php/parse_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php

parse.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/parse.php.txt>`

.. literalinclude:: php/parse.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++

.. code-block:: bash

  $ php parse.php

.. literalinclude:: php/parse_result.txt
   :language: php
