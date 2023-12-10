.. _metadata_format:

地名解析辞書メタデータフォーマット
==================================

地名解析辞書を Web 上で公開する場合、および pygeonlp の
テキスト解析の辞書として利用する場合、
地名解析辞書の名称などの情報を記載したメタデータが必要です。

メタデータのサンプル
--------------------

地名解析辞書のメタデータは次のような JSON フォーマットで記載します。
このフォーマットは、
`Google データセット検索 <https://datasetsearch.research.google.com/>`_
で地名解析辞書を検索できるようにするための
`構造化データ <https://developers.google.com/search/docs/appearance/structured-data/dataset?hl=ja>`_
を兼ねています。

.. code-block:: json

  {
    "@context": "https://schema.org/",
    "@type": "Dataset",
    "name": "歴史的行政区域データセットβ版地名辞書",
    "keywords": ["GeoNLP", "地名辞書"],
    "alternateName": "",
    "description": "歴史的行政区域データセットβ版で構築した地名辞書です。1920年から2020年までの国土数値情報「行政区域データ」に出現する市区町村をリスト化し、独自の固有IDを付与して公開しています。データセット構築の詳しい手法については、「歴史的行政区域データセットβ版」のウェブサイトをご覧ください。",
    "url": "https://geonlp.ex.nii.ac.jp/dictionary/geoshape-city/",
    "distribution": [{
      "@type": "DataDownload",
      "contentUrl": "http://agora.ex.nii.ac.jp/GeoNLP/dict/geoshape-city.csv",
      "encodingFormat": "text/csv"
    }],
    "identifier": ["geonlp:geoshape-city"],
    "dateModified": "2021-01-04T22:03:51+09:00",
    "license": "https://creativecommons.org/licenses/by/4.0/",
    "size": "16421",
    "temporalCoverage": "../..",
    "creator": [{
      "name": "ROIS-DS人文学オープンデータ共同利用センター",
      "@type": "Organization",
      "sameAs": "http://codh.rois.ac.jp/"
    }],
    "isBasedOn": {
      "@type": "CreativeWork",
      "name": "歴史的行政区域データセットβ版",
      "url": "https://geoshape.ex.nii.ac.jp/city/"
    },
    "spatialCoverage": {
      "@type": "Place",
      "geo": {
        "@type": "GeoShape",
        "box": "24.06092 123.004496 45.5566280626738 148.772556996888"
      }
    }
  }

必須項目
--------

以下の項目は pygeonlp で利用する際に必須です。

- name : 辞書名として利用します
- identifier : 複数の identifier をリストで指定できますが（構造化データの
  仕様による）、そのうち ``geonlp::`` から始まるものをこのデータの
  地名解析辞書 identifier として利用します

その他の項目はこのデータが
`Google Dataset Search <https://datasetsearch.research.google.com/>`_ 
で検索できるようにするためのもので、なるべく詳細に記述した方が
検索によって見つかりやすくなります。

非公開の地名解析辞書を pygeonlp で利用したいだけの場合、
最小のメタデータは次のようになります。

.. code-block:: json

  {
    "name": "日本の鉄道駅（2019年）",
    "identifier": ["geonlp:ksj-station-N02-2019"]
  }
