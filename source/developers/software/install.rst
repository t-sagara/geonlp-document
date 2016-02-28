.. _software_install:

====================================================
インストール
====================================================

動作に必要な環境
====================================================

GeoNLP ソフトウェアをインストールするには、以下の環境やライブラリ等が必要になります。

apt, yum などのパッケージマネージャを利用してインストールする場合は、開発者用パッケージ (-devel) も必要です。

OS
  UNIX系のOSが必要です。Windowsには対応していません。

  CentOS 6.7, CentOS 7.2, Ubuntu 14.04 で動作を確認しています。CentOS でのインストール手順は :ref:`software_install_centos` を、 Ubuntu 14.04 でのインストール手順は :ref:`software_install_ubuntu` をご覧ください。

GNU C++
  プログラムのコンパイルに GNU C++ (g++) が必要です。バージョン 4.1.2
  以降で動作を確認しています。

Boost Library
  C++ 拡張ライブラリ Boost のバージョン 1.34 以降で動作を確認しています。

  ヘッダファイルの他、libboost-system, libboost-filesystem, libboost-regex, libboost-thread をインストールする必要があります。

MeCab
  形態素解析エンジン MeCab を利用します。バージョン 0.98 以降で動作を確認しています。

  `MeCab ダウンロード <http://mecab.googlecode.com/svn/trunk/mecab/doc/index.html>`_

MeCab 用の辞書
  IPA 辞書, NAIST Japanese Dictionary が利用可能です。
  Juman 辞書, Unidic 辞書には対応していません。 UTF-8 である必要があります。

  `NAIST Japanese Dictionary
  <http://sourceforge.jp/projects/naist-jdic/>`_ (推奨)

  `IPA 辞書
  <http://code.google.com/p/mecab/downloads/detail?name=mecab-ipadic-2.7.0-20070801.tar.gz>`_

SQLite3
  ファイルベースの SQL データベース管理システムです。バージョン 3.4 以降で動作を確認しています。

PHP
  :ref:`software_dic_util` を利用する場合には PHP 5.3 以降が必要です。

GDAL
  :ref:`webapi_parse_option_geotime_filter` 機能のうち、geo- フィルタを利用する場合には `GDAL <http://www.gdal.org>`_ 1.x 系が必要です。利用しない場合は configure の際に --without-gdal を指定してください。

DAMS
  オープンソースのジオコーダライブラリです。インストールは必須ではありませんが、インストールされていない場合は住所文字列の抽出とジオコーディング機能が無効になります。バージョン 4.3.4 で動作を確認しています。

  `ジオコーダーDAMS <http://newspat.csis.u-tokyo.ac.jp/geocode/modules/dams/>`_


.. _software_install_compile:

コンパイル手順
====================================================

configure を利用した一般的な手順でインストールできます。

.. sourcecode:: bash

  % gzip -dc geonlp-latest.tgz | tar xfv -
  % cd geonlp-X.X
  % ./configure
  % make

DAMS の利用指定 (ver. 1.0.7 以降のみ有効)
----------------------------------------------------

DAMS を利用するかしないかを configure の --with-dams オプションで指定できます。利用しない場合には --with-dams=no, デフォルトディレクトリにインストールされている DAMS を利用する場合には --with-dams, それ以外の場所に DAMS をインストールした場合には --with-dams=/foo/bar のように指定してください。

.. sourcecode:: bash

  % ./configure --with-dams=/home/foo/geonlp

ディレクトリを指定する場合には、 DAMS の configure 時に prefix で指定した値を与えてください。デフォルトは /usr/local で、 /usr/local/lib ではない点に注意してください。 --with-dams オプションを省略した場合、デフォルトディレクトリに DAMS がインストールされていれば利用し、それ以外の場合は利用しません。

GDAL の利用指定 (ver. 1.2.0 以降のみ有効)
----------------------------------------------------

GDAL を利用するかしないかを configure の --with-gdal オプションで指定できます。利用しない場合には --with-gdal=no または --without-gdal を指定してください。

.. sourcecode:: bash

  % ./configure --without-gdal

GDAL を利用しないでコンパイルした場合は :ref:`webapi_parse_option_geotime_filter` が利用できなくなります。

GDAL を利用する場合、ヘッダファイルやライブラリの位置は gdal-config コマンドを実行して取得します。 gdal-config に実行パスが通っていれば自動的に見つけますが、 --with-gdal-config=/foo/bar/gdal-config のように指定することもできます。

ライブラリ、ヘッダファイルの場所指定
----------------------------------------------------

Boost や Sqlite3 などのライブラリが通常のライブラリパスにない場合、 configure のパラメータを指定する必要があります。たとえば Sqlite3 を /home/foo/ 以下にインストールした場合にはダイナミックリンクライブラリ libsqlite3.so.xx が /home/foo/lib に、ヘッダファイル sqlite3.h が /home/foo/include に配置されます。この場合には以下のようにパラメータを付けて configure を実行してください。

.. sourcecode:: bash

  % ./configure LDFLAGS=-L/home/foo/lib CXXFLAGS=-I/home/foo/include
 
.. _software_install_install:

インストール
====================================================

管理者権限でインストールします。

.. sourcecode:: bash

  % sudo make install

ライブラリファイルのインストール先ディレクトリが、動的ライブラリのリンクパスに含まれていない場合、 libgeonlp が見つからないというエラーが発生します。その場合は /etc/ld.so.conf にディレクトリを追加するか、環境変数 LD_LIBRARY_PATH を設定するといった処理を追加してください。

.. _software_install_centos:

CentOS でのインストール手順
====================================================

yum を利用し、以下のパッケージをインストールしておく必要があります。

(6.x の場合)
.. sourcecode:: bash

  % sudo yum install boost-devel sqlite-devel unzip

(7.x の場合)
.. sourcecode:: bash

  % sudo yum install boost-devel sqlite3-devel

MeCab, naist-jdic はリポジトリに登録されていませんので、ソースコードをダウンロードしてコンパイル・インストールしてください。

上記の他、もしインストールしていなければ、コンパイラと Make も必要です。

- automake
- autoconf
- gcc-c++
- make

GDAL を利用する場合、 EPEL リポジトリを追加し、 gdal-devel をインストールします。

  `EPEL リポジトリの追加方法（外部英語ページ）
  <https://fedoraproject.org/wiki/EPEL/FAQ#howtouse>`_

.. sourcecode:: bash

  % sudo yum install gdal-devel

あとは :ref:`software_install_compile` 以降に従ってください。

.. _software_install_debian:

Ubuntu 14.04 でのインストール手順
====================================================

apt-get を利用し、以下のパッケージをインストールしておく必要があります。

.. sourcecode:: bash

  % sudo apt-get install boost-devel sqlite3-devel mecab libmecab-dev mecab-ipadic-utf8

上記の他、もしインストールしていなければ、コンパイラと Make も必要です。

- g++
- make

GDAL を利用する場合、パーソナルパッケージアーカイブ（PPA）の 
`UbuntuGis team <https://launchpad.net/~ubuntugis/+archive/ubuntu/ubuntugis-unstable/>`_ を登録し、
libgdal1-dev をインストールします。

.. sourcecode:: bash

  % sudo add-apt-repository ppa:ubuntugis/ubuntugis-unstable
  $ sudo apt update
  $ sudo apt-get install libgdal1-dev

あとは :ref:`software_install_compile` 以降に従ってください。
