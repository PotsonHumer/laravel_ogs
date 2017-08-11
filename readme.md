### OGsys CMS 系統 ###

## 使用 Laravel 框架架設 ##

- 開發環境 laradock
- php 版本   : 7.1
- Mysql 版本 : 8.0.1

## 特殊注意事項 ##

- 套件檔案修改 "/vendor/laravel/framework/src/Illuminate/Database/Schema/Grammars/MySqlGrammar.php"
>
> 因資料庫欄位大小寫問題會造成 bug : 修改行數 45 column_name >>> column_name as "column_name"
>