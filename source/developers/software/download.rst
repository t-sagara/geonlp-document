.. _software_download:

====================================================
ダウンロード
====================================================

ご利用前の確認事項
====================================================

*GeoNLP ソフトウェア* を利用するには、UNIX 系の OS、GNU C++ を含む開発環境、コンパイル手順などの知識が必要です。詳細は :ref:`software_install` を参照してください。

*GeoNLP ソフトウェア* は FreeBSD ライセンスに基づくオープンソースのフリーソフトウェアです。詳細は :ref:`software_license` を参照してください。

ファイルダウンロード
===================================================

GeoNLP ソフトウェアのソースコードは以下のリンクからダウンロードできます。

`GeoNLP software version 1.0.7 (最新) <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.7.tgz>`_

`GeoNLP software version 1.0.6 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.6.tgz>`_

`GeoNLP software version 1.0.5 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.5.tgz>`_

`GeoNLP software version 1.0.4 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.4.tgz>`_

`GeoNLP software version 1.0.3 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.3.tgz>`_

`GeoNLP software version 1.0.2 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.2.tgz>`_

`GeoNLP software version 1.0.1 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.1.tgz>`_

`GeoNLP software version 1.0.0 <https://geonlp.ex.nii.ac.jp/software/geonlp-1.0.0.tgz>`_

都道府県、市区町村など必要最小限の :ref:`geonlp_terms_dictionary` は、 version 1.0.8 まではソースコードに同梱されています。1.0.9 以降は対話的な :ref:`software_dic_util` が同梱されていますので、そちらを利用して辞書をダウンロード、インストールしてください。

関連ファイルのダウンロード
===================================================

PHP バインディングは上記ソースコードに同梱されています。

上記以外の :ref:`geonlp_terms_dictionary` は `GeoNLP Data <https://geonlp.ex.nii.ac.jp/>`_ から検索してダウンロードしてください。ダウンロードした辞書をインポートする手順は :ref:`quick_import_data` を参照してください。


更新履歴
===================================================

Ver. 1.0.7

  configure 時に --with-dams オプションを指定できるように修正

  DAMS を利用している場合に実行される住所解析で、町名と字名が同じ住所（「北海道磯谷郡蘭越町蘭越町」など）の場合に町と字の地名語が正しく対応づけられないことがある不具合を修正（この修正を有効にするには、「日本の郡・市区町村」辞書および「日本の大字」辞書を、 address_level 項目が含まれている 2014 年 1 月 14 日以降のバージョンに更新する必要があります。同梱されている辞書は更新済みです。）
  
  :ref:`cmd_geonlp_ma` の出力フォーマットを CaboCha の layer 1 に合わせ、係り受け解析処理に利用できるように変更

  php 拡張モジュールを PHP 5.4 以降でもパッチを当てずにコンパイルできるように修正

Ver. 1.0.6

  同綴地名が複数存在し、他の地名語との関連だけでは判断できない場合に、他の地名語との空間的な距離が近い方を選択するロジックを追加

  ジオコーダを利用時に同綴住所が存在する場合、他の地名語との空間的な距離が近い方を選択するロジックを追加

  リクエストに改行コードが含まれると、処理中に欠落してしまう不具合を修正

Ver. 1.0.5

  `住所ジオコーダ DAMS <http://newspat.csis.u-tokyo.ac.jp/geocode/modules/dams/>`_ との連携機能を追加

ver. 1.0.4

  同綴地名が複数存在する場合の選択ロジックを改良

ver. 1.0.3

  Debian パッケージでインストールされた MeCab 辞書の自動判別機能を追加

ver. 1.0.2

  configure 時に libsqlite3 がインストールされていないとエラーになるように修正

  debian 7.1 で configure が生成する Makefile ではコンパイルが通らない問題に対応

  ToDo: debian パッケージでインストールされた MeCab 辞書の自動判別に失敗する問題には未対応

ver. 1.0.1

  インストール前、インストール後に動作確認を行う make test-preinstall, test-postinstall を追加
