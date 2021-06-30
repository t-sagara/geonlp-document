.. _install_pygeonlp_macos:

インストール手順 (MacOS)
=========================

ここでは MacOS に pygeonlp をインストールする手順の例を示します。
動作確認済みのバージョンは 11.3.1 です。

事前に必要なもの
----------------

pygeonlp は日本語形態素解析に `MeCab <https://taku910.github.io/mecab/>`_ C++ ライブラリと UTF8 の辞書を利用します。
また、 C++ 実装部分が `Boost C++ <https://www.boost.org/>`_ に依存します。

MeCab のインストール
++++++++++++++++++++

MacOS の場合には、 `Homebrew <https://brew.sh/index_ja>`_ を利用して
Mecab をインストールします。

まず Homebrew 公式サイトの手順通りにインストールします。 ::

  /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

次に brew コマンドを利用して mecab と mecab-ipadic をインストールします。 ::

  brew install mecab mecab-ipadic

Python3 のインストール
++++++++++++++++++++++

Python3 も brew コマンドでインストールできます。 ::

  brew install python3

Boost のインストール
++++++++++++++++++++

Boost は、 brew でインストールしたものでは link 時にエラーが発生するため、
手動でのインストール手順を紹介します。

boost-python がコンパイルできるように、先に python3 を brew で
インストールしておいてください。 ::

  curl https://jaist.dl.sourceforge.net/project/boost/boost/1.76.0/boost_1_76_0.tar.bz2 --output - | tar xj
  cd boost_1_76_0
  ./bootstrap.sh

project-config.jam が生成されるので、 ``using python`` の行を brew が
インストールする python3 に合わせて次のように変更してください。
この行には python のバージョン、 python コマンドのフルパス、 pyconfig.h が
置かれているディレクトリのフルパスを記述します。 ::

  if ! [ python.configured ]
  {
      using python : 3.9 : /opt/homebrew/bin/python3 : /opt/homebrew/Cellar/python@3.9/3.9.5/Frameworks/Python.framework/Versions/3.9/include/python3.9 ;
  }

コンパイルとインストールを行ないます。 ::

  ./b2
  sudo ./b2 install --prefix=/opt/boost_1_76

pygeonlp のインストール
-----------------------

pygeonlp パッケージは pip コマンドでインストールできますが、
boost と Homebrew のヘッダファイルとライブラリの場所を
環境変数で指定する必要があります。 ::

  $ CFLAGS="-I/opt/boost_1_76/include -I/opt/homebrew/include" LDFLAGS="-L/opt/boost_1_76/lib -L/opt/homebrew/lib" pip3 install pygeonlp

python を実行する際、 Homebrew の python の場合は boost ライブラリの場所を、
pyenv でインストールした python の場合は boost ライブラリと
Homebrew のライブラリの場所を、環境変数 ``LD_LIBRARY_PATH`` で指示しないと
``libboost_regex.dylib`` が見つからないというエラーが発生します。 ::

  python3
  >>> import pygeonlp.api
  Traceback (most recent call last):
    File "<stdin>", line 1, in <module>
    ...
  ImportError: dlopen(/opt/homebrew/lib/python3.9/site-packages/pygeonlp/capi.cpython-39-darwin.so, 2): Library not loaded: @rpath/libboost_regex.dylib
  Referenced from: /opt/homebrew/lib/python3.9/site-packages/pygeonlp/capi.cpython-39-darwin.so
  Reason: image not found

このエラーは ``LD_LIBRARY_PATH`` を指定すれば解決します。 ::

  LD_LIBRARY_PATH=/opt/boost_1_76/lib:/opt/homebrew/lib python3
  >>> import pygeonlp.api

毎回指定したくない場合は、 ``~/.zprofile`` などで設定してください。 ::

  export LD_LIBRARY_PATH=/opt/boost_1_76/lib:/opt/homebrew/lib


GDAL のインストール
+++++++++++++++++++

この項目はオプションです。

pygeonlp は `GDAL <https://pypi.org/project/GDAL/>`_ をインストールすると、
:ref:`spatialfilter` を利用することができます。
また、同じ名前の地名語が複数存在する場合の曖昧性解決に「空間的な距離」を
利用することができ、精度が向上します。

MacOS の場合は、 brew コマンドで gdal 3.3 をインストールします。 ::

  brew install gdal

GDAL が有効になっているかどうかは次の手順で確認してください。 ::

  $ python3
  >>> from pygeonlp.api.spatial_filter import GeoContainsFilter
  >>> gcfilter = GeoContainsFilter({"type":"Polygon","coordinates":[[[139.43,35.54],[139.91,35.54],[139.91,35.83],[139.43,35.83],[139.43,35.54]]]})

GDAL がインストールされていない場合は from の行で、
正常に動作していない場合は gcfilter の行で例外が発生します。
