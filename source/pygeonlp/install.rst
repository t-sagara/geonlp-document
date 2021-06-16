.. _install_pygeonlp:

インストール手順
================

事前に必要なもの
----------------

pygeonlp は日本語形態素解析に `MeCab <https://taku910.github.io/mecab/>`_ C++ ライブラリと UTF8 の辞書を利用します。
また、 C++ 実装部分が `Boost C++ <https://www.boost.org/>`_ に依存します。

これらのパッケージは OS によってインストール手順が異なりますが、 Ubuntu の場合には
以下のコマンドでインストールできます。::

  $ sudo apt install libmecab-dev mecab-ipadic-utf8 libboost-all-dev

pygeonlp のインストール
-----------------------

pygeonlp パッケージは ``pip`` コマンドでインストールできます。
先に pip と setuptools を最新バージョンにアップグレードしてから実行することをお勧めします。::

  $ pip install --upgrade pip setuptools
  $ pip install pygeonlp

GDAL のインストール
+++++++++++++++++++

この項目はオプションです。

pygeonlp は `GDAL <https://pypi.org/project/GDAL/>`_ をインストールすると、
:ref:`spatialfilter`
を利用することができます。
また、同じ名前の地名語が複数存在する場合の曖昧性解決に「空間的な距離」を
利用することができ、精度が向上します。::

  $ sudo apt install libgdal-dev
  $ pip install gdal

ただし ``libgdal`` と ``gdal`` パッケージのバージョンが一致している必要があります。
たとえば::

  $ apt search libgdal-dev
  libgdal-dev/bionic,now 2.4.2+dfsg-1~bionic0 amd64

のように libgdal 2.4.2 がインストールされている場合は、 gdal も 2.4.2 を
インストールしてください。::

  $ pip install gdal==2.4.2

jageocoder のインストール
+++++++++++++++++++++++++

この項目はオプションです。

pygeonlp は `jageocoder <https://pypi.org/project/jageocoder/>`_ 
をインストールすると、住所ジオコーディング機能を利用することができます。

最初に利用するときは、辞書データのダウンロードとインデックス作成を行なってください。::

  $ mkdir db/
  $ wget https://www.info-proto.com/static/jusho.zip
  $ unzip jusho.zip -d db/
  $ pip install jageocoder
  $ python
  >>> import jageocoder
  >>> jageocoder.init(dsn='sqlite:///db/address.db', trie_path='db/address.trie')
  >>> jageocoder.create_trie_index()


地名語解析辞書の登録
--------------------

``scripts/setup_dictionaries.py`` を実行すると、
``base_data/`` に含まれている地名語解析辞書（`*.json`, `*.csv`）を
``$HOME/geonlp/dic`` に登録します。::

  $ python scripts/setup_dictionaries.py

辞書ディレクトリを変更したい場合は、環境変数 ``GEONLP_DIR`` で指定してください。

このスクリプトで登録される辞書は 「日本の都道府県」 (``geonlp:geoshape-pref``)、 「歴史的行政区域データセットβ版地名辞書」 (``geonlp:geoshape-city``)、
「日本の鉄道駅（2012年）」 (``geonlp:station-2013``) の3種類です。


pygeonlp のアンインストール
---------------------------

pygeonlp が不要になった場合は以下のコマンドでアンインストールできます。::

  pip uninstall pygeonlp

GDAL や jageocoder も不要な場合、それぞれアンインストールしてください。::

  pip uninstall gdal
  pip uninstall jageocoder



地名語解析辞書の完全削除
------------------------

地名語解析辞書を登録すると、指定したディレクトリに辞書ファイルやインデックスファイルを
作成します。それ以外の場所は変更しませんので、全ての辞書を削除したい場合は
ディレクトリごと消去してください。::

  $ rm -r $HOME/geonlp/dic

環境変数 ``GEONLP_DIR`` を指定していた場合はそのディレクトリを削除してください。::

  $ rm -r $GEONLP_DIR


