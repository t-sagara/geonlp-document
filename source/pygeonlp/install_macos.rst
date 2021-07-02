.. _install_pygeonlp_macos:

インストール手順 (MacOS 11)
===========================

ここでは MacOS に pygeonlp をインストールする手順の例を示します。
動作確認済みのバージョンは 11.3.1 です。

python, pip の準備
------------------

MacOS では python 3.x と pip を `Homebrew <https://brew.sh/index_ja>`_ で
インストールします。 

まず Homebrew 公式サイトの手順通りにインストールします。 ::

  /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

次に brew コマンドで python3 をインストールします。 ::

  brew install python3
  python3 --version
  Python 3.9.5

Python 3.9.5 は pygeonlp に対応しています。この python をそのまま
利用する場合は、以降の説明の ``python`` を ``python3`` に、
``pip`` を ``pip3`` に読み換えてください。

他のモジュールとの依存関係などで問題が起こる可能性があるので、
なるべく ``pyenv``, ``pipenv`` を利用してプロジェクトごとに
独立した環境を用意することをお勧めします。 ::

  brew install pyenv pipenv
  pyenv install --list
  pyenv install 3.9.5
  pipenv --python=3.9.5

事前に必要なもの
----------------

pygeonlp は日本語形態素解析に `MeCab <https://taku910.github.io/mecab/>`_ 
C++ ライブラリと UTF8 の辞書を利用します。
また、 C++ 実装部分が `Boost C++ <https://www.boost.org/>`_ に依存します。

MeCab のインストール
++++++++++++++++++++

Mecab は brew コマンドでインストールします。 ::

  % brew install mecab mecab-ipadic

Boost のインストール
++++++++++++++++++++

Boost は brew でインストールできます。 ::

  % brew install boost

しかし pygeonlp のインストール時に link エラーが発生するケースがあるため、
ここでは手動でインストールする手順を紹介します。 ::

  % curl https://jaist.dl.sourceforge.net/project/boost/boost/1.76.0/boost_1_76_0.tar.bz2 --output - | tar xj
  % cd boost_1_76_0
  % ./bootstrap.sh --prefix=/opt/homebrew/Cellar/boost/1.76.0 --libdir=/opt/homebrew/Cellar/boost/1.76.0/lib --with-icu=/opt/homebrew/opt/icu4c --without-libraries=python,mpi
  % ./b2 headers 
  % ./b2 --prefix=/opt/homebrew/Cellar/boost/1.76.0 --libdir=/opt/homebrew/Cellar/boost/1.76.0/lib -d2 -j8 --layout=tagged-1.66 -sNO_LZMA=1 -sNO_ZSTD=1 install threading=multi,single link=shared,static
  % brew link boost

pygeonlp のインストール
-----------------------

pygeonlp パッケージは pip コマンドでインストールできますが、
Homebrew のヘッダファイルとライブラリの場所を環境変数で指定する必要があります。 ::

  $ CFLAGS="-I/opt/homebrew/include" LDFLAGS="-L/opt/homebrew/lib" pip install pygeonlp

インストールはこれで完了しますが、 python を実行して pygeonlp.api
パッケージをインポートする際に boost ライブラリが見つからず、
``libboost_regex.dylib`` が見つからないというエラーが発生します。 ::

  python
  >>> import pygeonlp.api
  Traceback (most recent call last):
    File "<stdin>", line 1, in <module>
    ...
  ImportError: dlopen(/opt/homebrew/lib/python3.9/site-packages/pygeonlp/capi.cpython-39-darwin.so, 2): Library not loaded: @rpath/libboost_regex-mt.dylib
  Referenced from: /opt/homebrew/lib/python3.9/site-packages/pygeonlp/capi.cpython-39-darwin.so
  Reason: image not found

このエラーは環境変数 ``DYLD_LIBRARY_PATH`` を指定すれば解決します。 ::

  DYLD_LIBRARY_PATH=/opt/homebrew/lib python
  >>> import pygeonlp.api

毎回指定したくない場合は、 ``~/.zprofile`` などで設定してください。 ::

  export DYLD_LIBRARY_PATH=/opt/homebrew/lib:$DYLD_LIBRARY_PATH


GDAL のインストール
+++++++++++++++++++

この項目はオプションです。

pygeonlp は `GDAL <https://pypi.org/project/GDAL/>`_ をインストールすると、
:ref:`spatialfilter` を利用することができます。
また、同じ名前の地名語が複数存在する場合の曖昧性解決に「空間的な距離」を
利用することができ、精度が向上します。

MacOS の場合は、 brew コマンドで gdal 3.3 をインストールします。
同時に brew python 用の gdal パッケージもインストールされます。 ::

  brew install gdal

Pipenv 環境を利用している場合は、その環境の python 用に
pip で gdal パッケージをインストールしてください。 ::

  pip install gdal==3.3

GDAL が有効になっているかどうかは次の手順で確認してください。 ::

  $ python
  >>> from pygeonlp.api.spatial_filter import GeoContainsFilter
  >>> gcfilter = GeoContainsFilter({"type":"Polygon","coordinates":[[[139.43,35.54],[139.91,35.54],[139.91,35.83],[139.43,35.83],[139.43,35.54]]]})

GDAL がインストールされていない場合は from の行で、
正常に動作していない場合は gcfilter の行で例外が発生します。
