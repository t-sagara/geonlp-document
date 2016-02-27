.. _webapi_parseStructured:

================================================
parseStructured
================================================

バージョン1.1.0 以前の説明は :ref:`webapi_parseStructured_110` へ。

説明
---------------------------------------

他のタグ付け器等で構造化されているテキスト、または一連のテキストのジオパース処理を行う。

文法
---------------------------------------

object **geonlp.parseStructured** (string[] *sentences* [, object *options*])

リクエストパラメータ
---------------------------------------

*sentences*
  - 変換したいテキストの配列
  - 要素の長さ、要素数の上限なし
  - それぞれの要素は連続したテキストの部分として解析され、
    相互の地名解決に影響する

*options*
  - 利用する辞書の指定など、処理のオプションを設定する
  - オプションの詳細は :ref:`webapi_parse_option` を参照

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  { 
    "method": "geonlp.parseStructured",
    "params": 
      [
        [
          { "organization": {
              "surface" : "NII",
              "name" : "国立情報学研究所",
              "tel" : "03-4212-2000（代表）"
            }
          },
          "は千代田区一ツ橋１－２－１にあります。神保町から徒歩3分。"
        ],
      ],
    "id": "2"
  }


レスポンス
---------------------------------------

処理結果の構造化テキストを返す（ :ref:`webapi_parse` と同じ）。

レスポンスの例
++++++++++++++++++++++++++++++++++++++++
.. literalinclude:: php/parseStructured_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php

parseStructured.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/parseStructured.php.txt>`

.. literalinclude:: php/parseStructured.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++

.. code-block:: php

  $ php parseStructured.php

.. literalinclude:: php/parseStructured_result.txt
   :language: php
