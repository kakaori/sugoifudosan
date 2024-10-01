# Sugoi Fudosan

## ローカル開発環境

### 1. 構築手順

#### Docker のインストール

-   1-1. Docker インストーラーを[ダウンロード](https://www.docker.com/get-started)
-   1-2. Docker をインストール

#### プロジェクトのソースコードを取得と環境設定

-   1-3. ソースコードのダウンロード

    ```
    git clone git@github.com:kakaori/sugoifudosan.git
    cd sugoifudosan
    ```

-   1-4. 環境変数を設定

    ```
    cp src/.env.example src/.env
    ```

### 2. 初回の準備

-   2-1. Composerをインストール (TODO)

-   2-2. sailコマンドをエイリアスに登録

    ~/.zshrc や ~/.bashrc に追記
    ```
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
    ```

-   2-3. Laravel Sailを起動

    ```
    sail up -d
    ```

-   2-4. Composerのautoloadファイルを作成

    ```
    sail composer dump-autoload
    ```

-   2-5. npmパッケージをインストール

    ```
    sail npm install
    ```

-   2-6. テストデータ作成 (不必要)

    ```
    sail artisan migrate --seed
    ```

### 3. 起動と終了

-   3-1. Laravel Sailを起動

    ```
    sail up -d
    ```

-   3-2. ViteのHMRを起動

    ```
    sail npm run dev
    ```

-   3-3. URLを表示

    ```
    http://localhost
    ```

-   3-4. 終了

    (コンテナを停止)

    ```
    sail stop
    ```

    (コンテナを削除)

    ```
    sail down
    ```

    (コンテナとボリュームを削除)  
    MySQLのデータをリセットする際に使用

    ```
    sail down --volumes
    ```

### 4. 各URL

-   Sugoi Fudosan
    - http://localhost

### 5. 開発時によく使うコマンド

-   5-1. ViteのHMRを起動

    ```
    sail npm run dev
    ```

-   5-2. 本番向けビルド

    ```
    sail npm run build
    ```

-   5-3. MySQLのクエリログ確認

    ```
    sail exec mysql tail -f /var/lib/mysql/query.log
    ```

-   5-4. コンテナプロセス確認

    ```
    sail ps
    ```

-   5-5. コンテナにアクセス

    ```
    sail shell
    ```

-   5-6. Seederを実行

    ```
    sail artisan db:seed
    ```

-   5-7. PHPUnit実行

    ```
    sail test
    ```

-   5-8. Laravel Pintで整形

    ```
    sail pint
    ```

-   5-9. PHPCSを実行

    ```
    sail composer phpcs
    ```

-   5-10. PHPCSで整形

    ```
    sail composer phpcs-fix
    ```

-   5-11. Laravel PintとPHPCSで整形

    ```
    sail composer fix
    ```

-   5-12. PHPMDを実行

    ```
    sail composer phpmd
    ```

-   5-13. PHPStanを実行

    ```
    sail composer phpstan
    ```

-   5-14. ESLintを実行

    ```
    sail npm run eslint
    ```

-   5-15. ESLintで整形

    ```
    sail npm run eslint:fix
    ```

-   5-16. Prettierを実行

    ```
    sail npm run prettier
    ```

-   5-17. Prettierで整形

    ```
    sail npm run prettier:fix
    ```

-   5-18. Stylelintを実行

    ```
    sail npm run stylelint
    ```

-   5-19. Stylelintで整形

    ```
    sail npm run stylelint:fix
    ```

-   5-20. Storybookを起動

    ```
    sail npm run storybook
    ```

### 6. デプロイ方法 (TODO)
