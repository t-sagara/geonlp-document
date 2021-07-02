.. _install_pygeonlp:

インストール手順
================

動作確認済みOSでの手順
----------------------

動作確認済み OS の場合は対応する手順を参照してください。

- :ref:`install_pygeonlp_ubuntu`
- :ref:`install_pygeonlp_centos`
- :ref:`install_pygeonlp_macos`

上記以外のOSでの手順
--------------------

pygeonlp は日本語形態素解析に `MeCab <https://taku910.github.io/mecab/>`_ C++ ライブラリと UTF8 の辞書を利用します。
また、 C++ 実装部分が `Boost C++ <https://www.boost.org/>`_ に依存します。
この2つは必ずインストールする必要があります。

オプションとして、 `GDAL <https://pypi.org/project/GDAL/>`_ を
インストールすると、 :ref:`spatialfilter` を利用することができます。

それぞれの OS に合わせて、以下の順序でインストールしてください。
なお、 Windows には対応していません。

- Python 3.6.8 以降と pip をインストール
- MeCab C++ ライブラリと IPA 辞書をインストール
- Boost C++ ライブラリをインストール (1.76 で動作確認) 
- pygeonlp を ``pip install pygeonlp`` でインストール
- (オプション) `GDAL <https://pypi.org/project/GDAL/>`_ をインストール


インストール後の作業
--------------------

pygeonlp のインストールが完了した後、地名解析辞書を
データベースに登録する作業を行なう必要があります。

pygeonlp モジュールには基本的な地名語辞書が付属しています。
初回実行時に次の処理を実行して、付属の地名解析辞書を登録した
データベースを作成してください。 ::

  python
  >>> import pygeonlp.api as api
  >>> api.setup_basic_database()

データベースは ``$(HOME)/geonlp/dic`` に作成されます。
データベースのディレクトリを変更したい場合は、
環境変数 ``GEONLP_DIR`` を宣言してから実行してください。

この処理で登録される基本辞書は以下の3種類です。

- 日本の都道府県 (``geonlp:geoshape-pref``)
- 歴史的行政区域データセットβ版地名辞書 (``geonlp:geoshape-city``)
- 日本の鉄道駅（2019年） (``geonlp:ksj-station-N02-2019``)


pygeonlp のアンインストール
---------------------------

pygeonlp が不要になった場合は以下のコマンドでアンインストールできます。 ::

  pip uninstall pygeonlp

GDAL も不要な場合にはアンインストールしてください。 ::

  pip uninstall gdal


地名語解析辞書の完全削除
------------------------

地名語解析辞書を登録すると、指定したディレクトリに辞書ファイルや
インデックスファイルを作成します。それ以外の場所は変更しませんので、
全ての辞書を削除したい場合はディレクトリごと消去してください。 ::

  $ rm -r $HOME/geonlp/dic

環境変数 ``GEONLP_DIR`` を指定していた場合はそのディレクトリを削除してください。 ::

  $ rm -r $GEONLP_DIR


