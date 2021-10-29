<div class="users form content">
    <a href="https://oauth.yandex.ru/authorize?response_type=token&client_id=7dcb03416bd2465c89cda186f5a2fe6b" class="button"><?= __('Login with Yandex') ?></a>
</div>
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function(event) {
    if (window.location.hash != '')
        window.location.href = window.location.origin + window.location.pathname + "?" + window.location.hash.slice(1)
})
</script>