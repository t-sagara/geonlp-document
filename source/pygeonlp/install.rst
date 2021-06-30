.. _install_pygeonlp:

インストール手順
================

事前に必要なもの
----------------

pygeonlp は日本語形態素解析に `MeCab <https://taku910.github.io/mecab/>`_ C++ ライブラリと UTF8 の辞書を利用します。
また、 C++ 実装部分が `Boost C++ <https://www.boost.org/>`_ に依存します。

これらのパッケージは OS によってインストール手順が異なります。
対応する OS の手順を参照してください。

- :ref:`install_pygeonlp_ubuntu`
- :ref:`install_pygeonlp_centos`
- :ref:`install_pygeonlp_macos`

pygeonlp のインストール
-----------------------

Python 3.7 以降の環境を用意してください。
pygeonlp パッケージは ``pip`` コマンドでインストールできます。 ::

  $ pip install pygeonlp

pip や setuptools が古いとエラーが発生する場合があります。
その場合は pip と setuptools を最新バージョンにアップグレードしてから
実行してみてください。 ::

  $ pip install --upgrade pip setuptools

GDAL のインストール
+++++++++++++++++++

この項目はオプションです。

pygeonlp は `GDAL <https://pypi.org/project/GDAL/>`_ をインストールすると、
:ref:`spatialfilter`
を利用することができます。
また、同じ名前の地名語が複数存在する場合の曖昧性解決に「空間的な距離」を
利用することができ、精度が向上します。

GDAL のインストール手順は OS によって異なります。
対応する OS の手順を参照してください。

- :ref:`install_pygeonlp_ubuntu`
- :ref:`install_pygeonlp_centos`
- :ref:`install_pygeonlp_macos`

jageocoder のインストール
+++++++++++++++++++++++++

この項目はオプションです。

pygeonlp は `jageocoder <https://pypi.org/project/jageocoder/>`_ 
をインストールすると、住所ジオコーディング機能を利用することができます。

詳細は :ref:`link_jageocoder` を参照してください。


地名解析辞書の登録
------------------

pygeonlp モジュールには基本的な地名語辞書が付属しています。
初回実行時に次の処理を実行して、付属の地名解析辞書を登録した
データベースを作成してください。 ::

  python
  >>> import pygeonlp.api as api
  >>> api.setup_basic_database()

データベースは ``$(HOME)/geonlp/dic`` に作成されます。
データベースのディレクトリを変更したい場合は、
環境変数 ``GEONLP_DIR`` を宣言してから実行してください。

この処理で登録される基本辞書は 「日本の都道府県」 (``geonlp:geoshape-pref``)、 「歴史的行政区域データセットβ版地名辞書」 (``geonlp:geoshape-city``)、
「日本の鉄道駅（2019年）」 (``geonlp:ksj-station-N02-2019``) の3種類です。


pygeonlp のアンインストール
---------------------------

pygeonlp が不要になった場合は以下のコマンドでアンインストールできます。 ::

  pip uninstall pygeonlp

GDAL や jageocoder も不要な場合、それぞれアンインストールしてください。 ::

  pip uninstall gdal
  pip uninstall jageocoder


地名語解析辞書の完全削除
------------------------

地名語解析辞書を登録すると、指定したディレクトリに辞書ファイルやインデックスファイルを
作成します。それ以外の場所は変更しませんので、全ての辞書を削除したい場合は
ディレクトリごと消去してください。::

  $ rm -r $HOME/geonlp/dic

環境変数 ``GEONLP_DIR`` を指定していた場合はそのディレクトリを削除してください。 ::

  $ rm -r $GEONLP_DIR


