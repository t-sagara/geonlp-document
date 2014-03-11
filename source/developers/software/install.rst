.. _software_install:

====================================================
インストール
====================================================

動作に必要な環境
====================================================

GeoNLP ソフトウェアをインストールするには、以下の環境やライブラリ等が
必要になります。

apt, yum などのパッケージマネージャを利用してインストールする場合は、
開発者用パッケージ (-devel) も必要です。

OS
  UNIX系のOSが必要です。Windowsには対応していません。

  CentOS 4.7, CentOS 5.10, CentOS 6.4, Debian 7.1 で動作を確認しています。（ただし Debian 7.1 は Version 1.0.2 以前のバージョンでは動きません）。CentOS 6.4 でのインストール手順は :ref:`software_install_centos` を、 Debian 7.1 でのインストール手順は :ref:`software_install_debian` をご覧ください。

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


DAMS
  オープンソースのジオコーダライブラリです。インストールは必須ではありませんが、インストールされていない場合は住所文字列の抽出とジオコーディング機能が無効になります。

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


ライブラリ、ヘッダファイルの場所指定
----------------------------------------------------

Boost や Sqlite3 などのライブラリが通常のライブラリパスにない場合、 configure のパラメータを指定する必要があります。たとえば Sqlite3 を /home/foo/ 以下にインストールした場合にはダイナミックリンクライブラリ libsqlite3.so.xx が /home/foo/lib に、ヘッダファイル sqlite3.h が /home/foo/include に配置されます。この場合には以下のようにパラメータを付けて configure を実行してください。

.. sourcecode:: bash

  % ./configure LDFLAGS=-L/home/foo/lib CXXFLAGS=-I/home/foo/include
 
.. _software_install_pretest:

動作確認
====================================================

コンパイルが終わったら、次のコマンドで動作確認を行います。

.. sourcecode:: bash

  % make test-preinstall

このテストでは、 dict/ ディレクトリに一時的に生成された辞書を利用し、 src/geonlp_api コマンドで解析ができるかどうかを確認します。以下のような JSON 形式の結果が出力されれば、コンパイル成功です。

.. literalinclude:: test_result.json
   :language: javascript

.. _software_install_install:

インストール
====================================================

管理者権限でインストールします。

.. sourcecode:: bash

  % su
  # make install

正しくインストールできたことを確認するには、次のコマンドを実行します。

.. sourcecode:: bash

  % make test-postinstall

このテストでは、辞書インストール先ディレクトリ（デフォルトでは /usr/local/lib/geonlp/）の辞書を利用し、コマンドインストール先ディレクトリ（デフォルトでは /usr/local/bin/）の geonlp_api コマンドで解析ができるかどうかを確認します。 test-preinstall と同じ結果が得られればインストール成功です。

ライブラリファイルのインストール先ディレクトリが、動的ライブラリのリンクパスに含まれていない場合、 libgeonlp が見つからないというエラーが発生します。その場合は /etc/ld.so.conf にディレクトリを追加するか、環境変数 LD_LIBRARY_PATH を設定するといった処理を追加してください。


.. _software_install_adddic:

地名語辞書の追加インストール
====================================================

同梱されている以外の地名語辞書を `GeoNLP サイト <https://geonlp.ex.nii.ac.jp>`_ からダウンロードして利用したい場合、 :ref:`cmd_geonlp_add` コマンドで登録し、 :ref:`cmd_geonlp_ma_makedic` コマンドでインデックス等を更新します。以下のように、 dict/zip/ ディレクトリにダウンロードした辞書をコピーして make しなおせば、追加した辞書も利用できるようになります。

.. sourcecode:: bash

  （geonlp-software を展開したディレクトリで）
  % wget https://geonlp.ex.nii.ac.jp/dictionary/kitamoto/evacuation/kitamoto_evacuation_20130918_u.zip
  % mv kitamoto_evacuation_20130918_u.zip dict/zip/
  % make
  % su
  # make install


.. _software_install_centos:

CentOS 6.4 でのインストール手順
====================================================

yum を利用し、以下のパッケージをインストールしておく必要があります。

- boost-devel
- sqlite-devel
- unzip

MeCab, naist-jdic はリポジトリに登録されていませんので、ソースコードをダウンロードしてコンパイル・インストールしてください。

上記の他、もしインストールしていなければ、コンパイラと Make も必要です。

- automake
- autoconf
- gcc-c++
- make

あとは :ref:`software_install_compile` 以降に従ってください。

.. _software_install_debian:

Debian 7.1 でのインストール手順
====================================================

apt-get または aptitude を利用し、以下のパッケージをインストールしておく必要があります。

- boost-dev
- libboost-system1.49-dev
- libboost-filesystem1.49-dev
- libboost-regex1.49-dev
- libboost-thread1.49-dev
- libmecab-dev
- sqlite3
- libsqlite3-dev
- mecab
- naist-jdic (EUC ではなく UTF-8 バージョンが必要です)

上記の他、もしインストールしていなければ、コンパイラと Make も必要です。

- g++
- make

あとは :ref:`software_install_compile` 以降に従ってください。
