.. deprecated:: 2.0.0
   このページの内容は参照のために残してありますが、既に利用できない機能や
   現在では誤りである情報を含んでいます。システム開発者は
   :ref:`pygeonlp` を参照してください。

.. _webapi_getDictionaryInfo:

================================================
getDictionaryInfo
================================================

説明
---------------------------------------

辞書に関する詳細情報を取得する。

文法
---------------------------------------

object **geonlp.getDictionaryInfo** (int[] dictionary_ids)

リクエストパラメータ
---------------------------------------

*dictionary_ids*
 - 情報を取得したい辞書の id の配列
 - 要素数の上限なし

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  { 
    "method": "geonlp.getDictionaryInfo",
    "params": [ [28, 29] ],
    "id": "6"
  }


レスポンス
---------------------------------------

リクエストで指定した辞書 id をキー、対応する辞書情報を値とする
object を返す。


レスポンスの例
++++++++++++++++++++++++++++++++++++++++
.. literalinclude:: php/getDictionaryInfo_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php

getDictinaryInfo.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/getDictionaryInfo.php.txt>`

.. literalinclude:: php/getDictionaryInfo.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++

.. sourcecode :: bash

  $ php getDictionaryInfo.php

.. literalinclude:: php/getDictionaryInfo_result.txt
   :language: php
