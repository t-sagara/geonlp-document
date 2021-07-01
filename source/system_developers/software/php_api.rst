.. deprecated:: 2.0.0
   このページの内容は参照のために残してありますが、既に利用できない機能や
   現在では誤りである情報を含んでいます。システム開発者は
   :ref:`pygeonlp` を参照してください。

.. _software_php_api:

====================================================
PHP API リファレンス
====================================================

GeoNLP を PHP から利用するための API リファレンスです。
より高度なアプリケーションを PHP で開発することができます。

PHP 拡張モジュールのインストール
====================================================

配布パッケージの php-extension で make, make install してください。

.. sourcecode:: bash

  % cd php-extension
  % make
  % sudo make install

PHP 拡張モジュールを作成するために、 PHP の開発用パッケージや、CodeGen_PECL などが必要になる場合があります。詳細は同ディレクトリに含まれている README を参照してください。

ジオコーダ DAMS を通常のディレクトリ以外の場所にインストールした場合、 make の際に 
configure: error: 'GeonlpService.h' header not found
というエラーが発生することがあります。その場合には /usr/include の下に dams.h をコピーしてください。

GeoNLP software ver 1.0.6 以下では、PHP 5.4 以降では phpize が生成する configure スクリプトや c++ コードがそのままでは通らないという不具合があります。以下の手順に従い、 :download:`パッチ <patch-php54.txt>` を当ててください。

.. sourcecode:: bash

  % cd php-extension
  % make
  (ここでエラーが出ます)
  % cd phpgeonlp
  % mv configure configure.org
  % mv phpgeonlp.cpp phpgeonlp.cpp.org
  % patch < patch-php54.txt
  % make
  % cd ../
  % sudo make install

インストール確認
----------------------------------------------------

インストールが正常に完了しているかどうか、以下の手順で確認します。

.. sourcecode:: bash

  % php -m | grep geonlp
  phpgeonlp

もし
PHP Warning: PHP Startup: Unable to load dynamic library
'/usr/lib64/php/modules/phpgeonlp.so' - libgeonlp-x.x.x.so
というエラーが表示される場合には、 libgeonlp-x.x.x.so がインストールされているディレクトリを動的ライブラリパスに追加する必要があります。環境変数 LD_LIBRARY_PATH をセットするか、 /etc/ld.so.conf に追加してください。

基本的な使い方
====================================================

GeoNLP サービスの初期化
----------------------------------------------------

PHP プログラム内で GeoNLP を利用するには、以下のコードを実行します。

.. sourcecode:: php

  <?php
  $gs = new GeonlpService();

リソースファイルを指定したい場合には、パラメータとしてリソースファイル
名を渡します。

.. sourcecode:: php

  <?php
  $gs = new GeonlpService("/usr/local/etc/geonlp.rc");

GeoNLP サービスの呼び出し
----------------------------------------------------

初期化したサービスの proc メソッドを呼び出すことで、 WebAPI のすべての
機能を PHP コード内から利用することができます。

.. sourcecode:: php

  $msg = "今日は神保町駅に行きます。";
  $request = array("method"=>"geonlp.parse", "params"=>array($msg), "id"=>1);
  $response = $gs->proc(json_encode($request));  
  $result = json_decode($response, true);
  print_r($result);

このプログラム例のように、 proc に渡すパラメータは JSON リクエスト文字列、
結果は JSON レスポンス文字列です。そのため、 PHP の配列と変換するには
json_encode, json_decode を利用する必要がある点に注意してください。


非 JSON メソッド
====================================================

地名語の検索のようなデータベースに問い合わせる処理は、
WebAPI の :ref:`webapi_search` でも実現できますが、
JSON を利用しない単純なメソッドも利用できます。

MAgetGeowordEntry
====================================================

説明
----------------------------------------------------

*geonlp_id* から地名語を検索します。
見つからなかった場合には false が返ります。

文法
----------------------------------------------------

object $gs->MAgetGeowordEntry(string *geonlp_id*);

パラメータ
----------------------------------------------------

*geonlp_id*
  - 検索したい地名語の geonlp_id

使い方
----------------------------------------------------

php-extension/tests/MAgetGeowordEntry.php を参照してください。


MAgetGeowordEntries
====================================================

説明
----------------------------------------------------

表記または読みから地名語を検索します。
結果は条件に該当する地名語の配列です。
接頭辞や接尾辞を省略した場合や、異体字が使われている場合にも検索できます。

文法
----------------------------------------------------

array $gs->MAgetGeowordEntries(string *key*);

パラメータ
----------------------------------------------------

*key*
  - 検索したい地名語の表記または読み

使い方
----------------------------------------------------

php-extension/tests/MAgetGeowordEntries.php を参照してください。


MAparse
====================================================

説明
----------------------------------------------------

自然言語文を拡張形態素解析した結果を返します。
コマンドラインプログラムの :ref:`cmd_geonlp_ma` と同じです。

文法
----------------------------------------------------

string $gs->MAparse(string *text*);

パラメータ
----------------------------------------------------

*text*
  - 解析したい自然言語文テキスト

使い方
----------------------------------------------------

php-extension/tests/MAparse.php を参照してください。


MAparseNode
====================================================

説明
----------------------------------------------------

自然言語文を拡張形態素解析した結果を返します。
単語ノードの詳細な情報をオブジェクトとして返すので、
解析結果をもとにより詳細な処理を行いたい場合に使います。

文法
----------------------------------------------------

array $gs->MAparseNode(string *text*);

パラメータ
----------------------------------------------------

*text*
  - 解析したい自然言語文テキスト

使い方
----------------------------------------------------

php-extension/tests/MAparseNode.php を参照してください。
