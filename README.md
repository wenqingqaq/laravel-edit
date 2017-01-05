# laravel-edit
laravel 百度ueditor编辑器安装包  
网上找到很多包但是都没有实现自己需要的七牛存储的功能，所以添加了这个包。  
自己使用吧！  
```
Wenqing\LaravelEdit\UEditorServiceProvider::class  
php artisan vendor:publish  

@include('vendor.ueditor.assets')  
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>

<!-- 编辑器容器 -->
<script id="container" name="content" type="text/plain"></script>
```


