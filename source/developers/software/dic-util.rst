.. _software_dic_util:

====================================================
GeoNLP 辞書管理ユーティリティ
====================================================

GeoNLP ソフトウェアは地名解析辞書を利用して地名語の抽出を行います。辞書は `GeoNLP サイト <https://geonlp.ex.nii.ac.jp>`_ からダウンロードできますが、辞書のダウンロードや更新、インデックス構築などの作業を対話的に行う *辞書管理ユーティリティ* を利用すると便利です。

.. _dic_util_usage:

使い方
====================================================

GeoNLP ソフトウェアを展開したディレクトリの下に geonlp-dic-util というディレクトリが含まれています。その中の geonlp-dic-util.php がユーティリティ本体の PHP スクリプトです。

.. sourcecode:: bash

  % cd geonlp-dic-util
  % php geonlp-dic-util.php <コマンド>

別のディレクトリにインストールしたい場合には、 lib/, resource/ ごと任意のディレクトリにコピーしてください。

ユーティリティでは以下のコマンドを利用できます。

.. _dic_util_list:

list
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 不要

`GeoNLP Data サイト <https://geonlp.ex.nii.ac.jp/>`_ 上の最新辞書情報を取得し、簡易一覧表示します。

.. sourcecode:: bash

  % php geonlp-dic-util.php list
  未登録  geonlp/world_country    世界の国・地域（2013年9月）
  未登録  geonlp/japan_area       日本の地方・地域（2013年）
  未登録  geonlp/japan_pref       日本の都道府県（2010年4月）
  未登録  geonlp/japan_city       日本の郡・市区町村（2013年9月）
  未登録  geonlp/japan_oaza       日本の大字（2012年）
  未登録  geonlp/japan_station    日本の鉄道駅（2012年）
  未登録  geonlp/japan_airport    日本の空港（2012年）
  未登録  geonlp/japan_river      日本の河川・湖沼（2009年）
  未登録  geonlp/japan_mountain   日本の山（2012年）
  ...

一番目の列は辞書がローカルサーバに登録済みか、更新が必要か、といった情報を表します。二番目の列は「辞書データ名」で、登録や削除などの際にはこの文字列で辞書を指定します。三番目の列は辞書のタイトルです。

.. _dic_util_show:

show
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 辞書データ名 [辞書データ名2 ...]

指定した辞書の詳細情報を表示します。

.. sourcecode:: bash

  % php geonlp-dic-util.php show geonlp/japan_area
  状態：  未登録（この辞書はダウンロードされていません）
  識別子  ：      https://geonlp.ex.nii.ac.jp/dictionary/geonlp/japan_area
  内部ID  ：      27
  作成者  ：      geonlp
  辞書名  ：      日本の地方・地域（2013年）
  情報ソース：    Wikipedia「日本の地域」（http://ja.wikipedia.org/wiki/%E6%97%A5%E6%9C%AC%E3%81%AE%E5%9C%B0%E5%9F%9F）
  気象庁「地方予報区」（http://www.jma.go.jp/jma/kishou/know/saibun/index.html）
  修正報告件数：  0
  公開日時：      2013-09-12 17:47:45
  修正日時：      2013-09-12 17:47:45
  ...

.. _dic_util_sync:

sync
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 不要

`GeoNLP Data サイト <https://geonlp.ex.nii.ac.jp/>`_ からダウンロード済みの辞書と、サイト上にある同じ辞書を比較し、更新可能なものがあれば最新の状態に更新します。

ローカルサーバ上に作成した :ref:`local_dic` をサイトにアップロードすることはありません。

.. _dic_util_add:

add
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 辞書データ名 [辞書データ名2 ...]

指定した辞書を `GeoNLP Data サイト <https://geonlp.ex.nii.ac.jp/>`_ からダウンロードし、ローカルサーバ上に登録します。登録された辞書は $(HOME)/.geonlp-dic-util/ 以下に展開され、同ディレクトリ内の repository.sq3 （SQLite3 データベースファイル）に登録した時刻などの情報が記録されます。

.. sourcecode:: bash

  % php geonlp-dic-util.php add geonlp/japan_pref geonlp/japan_city
  辞書（タイトル：'日本の都道府県（2010年4月） '）を公開サーバから取得します．
  - ZIP ファイルをダウンロードしています ...
  - ファイル '/home/sagara/.geonlp-dic-util/zip/28.zip' に保存します．
  - ZIP ファイルを '/home/sagara/.geonlp-dic-util/extracted/28/' に展開します．
  - ローカルリポジトリに登録します．
  完了.
  辞書（タイトル：'日本の郡・市区町村（2013年9月）'）を公開サーバから取得します．
  - ZIP ファイルをダウンロードしています ...
  - ファイル '/home/sagara/.geonlp-dic-util/zip/29.zip' に保存します．
  - ZIP ファイルを '/home/sagara/.geonlp-dic-util/extracted/29/' に展開します．
  - ローカルリポジトリに登録します．
  完了.
  % php geonlp-dic-util.php list
  未登録  geonlp/world_country    世界の国・地域（2013年9月）
  未登録  geonlp/japan_area       日本の地方・地域（2013年）
  最新    geonlp/japan_pref       日本の都道府県（2010年4月）
  最新    geonlp/japan_city       日本の郡・市区町村（2013年9月）
  未登録  geonlp/japan_oaza       日本の大字（2012年）
  ...

.. _dic_util_delete:

delete
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 辞書データ名 [辞書データ名2 ...]

指定した辞書をローカルサーバから削除します。

.. sourcecode:: bash

  % php geonlp-dic-util.php delete geonlp/japan_city
  辞書（タイトル：'日本の郡・市区町村（2013年9月）'）を削除しました．
  % php geonlp-dic-util.php list
  未登録  geonlp/world_country    世界の国・地域（2013年9月）
  未登録  geonlp/japan_area       日本の地方・地域（2013年）
  最新    geonlp/japan_pref       日本の都道府県（2010年4月）
  未登録  geonlp/japan_city       日本の郡・市区町村（2013年9月）
  未登録  geonlp/japan_oaza       日本の大字（2012年）
  ...

.. _dic_util_import:

import
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: <辞書コード> <CSVファイルパス/URL>

CSV ファイル形式の地名解析辞書を :ref:`local_dic` としてインポートします。辞書コードには任意の英数字による文字列を指定してください。インポート後は "local/<辞書コード>" がこの辞書の名前になります。

.. sourcecode:: bash

  % cat /tmp/univ.csv
  1,国立情報学研究所,教育施設/研究所,35.692478,139.758336
  2,東京大学,教育施設/大学,35.712941,35.712941
  % php geonlp-dic-util.php import univ /tmp/univ.csv
  - ローカルリポジトリに登録します．
  完了.
  % php geonlp-dic-util.php list
  未登録  geonlp/world_country    世界の国・地域（2013年9月）
  未登録  geonlp/japan_area       日本の地方・地域（2013年）
  最新    geonlp/japan_pref       日本の都道府県（2010年4月）
  未登録  geonlp/japan_city       日本の郡・市区町村（2013年9月）
  ...
  ローカル        local/univ      univ

.. _dic_util_compile:

compile
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 不要

ダウンロードまたはインポートした登録済み辞書をコンパイルし、バイナリ地名辞書を作成します。バイナリ地名辞書は $(HOME)/.geonlp-dic-util/ に作成されます。

.. sourcecode:: bash

  % php geonlp-dic-util.php compile
  辞書 '日本の都道府県（2010年4月） ' のデータを読み込みます．
  辞書 'univ' のデータを読み込みます．
  バイナリ地名辞書をコンパイルしています．
  プロファイルをロード中 : /home/sagara/.geonlp-dic-util/geonlp_local.rc
  完了しました．

.. _dic_util_install:

install
+++++++++++++++++++++++++++++++++++++++++++++

:パラメータ: 不要

コンパイルしたバイナリ地名辞書を GeoNLP ソフトウェアが認識するディレクトリにインストールします。バイナリ地名辞書をインストールするまでは GeoNLP の解析結果は変化しません。

.. sourcecode:: bash

  % php geonlp-dic-util.php install
  プロファイルをロード中 : /usr/local/etc/geonlp.rc
  以下のファイルをインストールします．
  2015-03-24 17:27:12 作成 => /home/geonlp/.geonlp-dic-util/geodic.sq3
  2015-03-24 17:27:13 作成 => /home/geonlp/.geonlp-dic-util/geo_name_fullname.drt
  2015-03-24 17:27:13 作成 => /home/geonlp/.geonlp-dic-util/wordlist.sq3
  2015-03-24 17:27:18 作成 => /home/geonlp/.geonlp-dic-util/mecabusr.dic
  古いファイルは上書きされます．よろしいですか？[y/n] y
  完了しました．


.. _dic_util_confirm:

動作確認
====================================================

辞書のインストール後、地名語が正しく登録されているかどうかを確認するには :ref:`cmd_geonlp_ma` コマンドを使うのが簡単です。

.. sourcecode:: bash

  % echo '今日は国立情報学研究所に行きました。' | geonlp_ma
  
  今日    名詞,副詞可能,*,*,*,*,今日,キョウ,キョー
  は      助詞,係助詞,*,*,*,*,は,ハ,ワ
  国立情報学研究所        名詞,固有名詞,地名語,_n169Ea:国立情報学研究所,*,*,国立情報学研究所,,
  に      助詞,格助詞,一般,*,*,*,に,ニ,ニ
  行き    動詞,自立,*,*,五段・カ行促音便,連用形,行く,イキ,イキ
  まし    助動詞,*,*,*,特殊・マス,連用形,ます,マシ,マシ
  た      助動詞,*,*,*,特殊・タ,基本形,た,タ,タ
  。      記号,句点,*,*,*,*,。,。,。
  EOS

この例では、インポートした CSV に含まれていた「国立情報学研究所」が、地名語として抽出できていることが分かります。


.. _local_dic:

ローカル辞書
====================================================

GeoNLP プロジェクトには、地名の辞書をオープンに整備するという目的も含まれており、作成した辞書はできる限り GeoNLP Data サイト上にアップロードして欲しいと考えています。しかし「位置情報付き地名」はデータの権利や個人情報の問題などにより、公開サーバにアップロードできない場合もあります。そういった場合には、 CSV ファイル形式の辞書をユーティリティの :ref:`dic_util_import` コマンドでインポートすれば、ローカルサーバ上でのみ利用できるようになります。

ローカル辞書として登録した地名語は、 GeoNLP ID として '_n' から始まる文字列を持ちます。この ID はインポートするたびに変わる可能性がありますので、地名の識別子としては使わないことを推奨します。
