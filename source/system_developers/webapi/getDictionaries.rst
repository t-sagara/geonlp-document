.. deprecated:: 2.0.0
   このページの内容は参照のために残してありますが、既に利用できない機能や
   現在では誤りである情報を含んでいます。システム開発者は
   :ref:`pygeonlp` を参照してください。

.. _webapi_getDictionaries:

================================================
getDictionaries
================================================

説明
---------------------------------------

利用可能な辞書一覧を取得する。

文法
---------------------------------------

object **geonlp.getDictionaries** (void)


リクエストパラメータ
---------------------------------------

なし

リクエストの例
++++++++++++++++++++++++++++++++++++++++
.. code-block:: javascript

  { 
    "method": "geonlp.getDictionaries",
    "params": [],
    "id": "5"
  }


レスポンス
---------------------------------------

登録されている全ての辞書の id をキー、辞書情報
（id, user_code, dictionary_code, name）
を値とする object を返す。


レスポンスの例
++++++++++++++++++++++++++++++++++++++++
.. literalinclude:: php/getDictionaries_result.json
   :language: javascript

PHP サンプルコード
---------------------------------------

jsonrpc_client.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/jsonrpc_client.php.txt>`

.. literalinclude:: php/jsonrpc_client.php.txt
   :language: php

getDictinaries.php
+++++++++++++++++++++++++++++++++++++++
:download:`ダウンロード <php/getDictionaries.php.txt>`

.. literalinclude:: php/getDictionaries.php.txt
   :language: php

実行結果
+++++++++++++++++++++++++++++++++++++++

.. sourcecode :: bash

  $ php getDictionaries.php

.. literalinclude:: php/getDictionaries_result.txt
   :language: php
