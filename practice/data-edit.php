<?php
require __DIR__. '/parts/connect_db.php';  // /開頭
$pageName ='edit'; //頁面名稱
$title ='編輯資料'; 
// 如果有有給pkey 轉向並結束
if(! isset($_GET['sid'])){
    header('Location: data-list.php');
    exit;
}
$sid = intval($_GET['sid']);
$sql = "SELECT * FROM address_book WHERE sid=$sid";
$r = $pdo->query($sql)->fetch();
// 如果沒有資料 會拿到ture 轉到列表頁
if(empty($r)){
    header('Location: data-list.php');
    exit;
}
// echo json_encode($r, JSON_UNESCAPED_UNICODE);
// exit;
?>

<?php include __DIR__. '/parts/html.head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">新增資料</h5>
                <form name='form1' onsubmit=" checkForm(); return false;" novalidate>  
                <!-- novalidate 不要驗證表單 -->
                <!-- https://www.wfublog.com/2021/04/html5-validator.html -->
                <input type="hidden" name="sid" value="<?= $r['sid'] ?>">
                <!-- hidden隱藏欄位 -->
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?=htmlentities($r['name']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=($r['email']) ?>">
                        <!-- 信箱驗證 -->
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?=($r['mobile']) ?>">
                        <!-- 手機驗證<input type="text" required="required" maxlength="11" pattern="09\d{2}-\d{6}"/> -->
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?=($r['birthday']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <textarea class="form-control" id="address" name="address" 
                            cols="50" rows="3"><?=htmlentities($r['address']) ?></textarea>
                        <!-- textarea /textarea 之間不能換行 裡面的所有值會在頁面上顯示 -->
                    </div>
                    <div id="msgContainer">
                        <!-- <div class="alert alert-danger" role="alert">
                        A simple danger alert—check it out!
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-primary">送出</button>

                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>
<script>
    const msgc = $('#msgContainer');
    function genAlert(msg, type='danger'){
        const a = $(`
        <div class="alert alert-${type}" role="alert">
            ${msg}
        </div>
        `);
        msgc.append(a);
        setTimeout(()=>{
            a.fadeOut(400, function(){
                a.remove();
            })
        }, 2000);
    }

    function checkForm(){
        //TODO: 檢查欄位資料格式是不是符合
        let isPass = true; //預設表單的資料是沒問題的
        const name = document.form1.name.value;
        const email = document.form1.email.value;
        if(name.length < 2){
            // alert('請填寫正確的姓名！');
            genAlert('請填寫正確的姓名！');
            isPass = false;
        }
        if(! email){
            genAlert('請填寫正確的信箱帳號！');
            isPass = false;
        }
        if(isPass){
            //送出表單資料
            $.post(
                //第一個參數要送給誰
                'data-edit-api.php', 
                //第二個參數：送出的資料
                $(document.form1).serialize(),
                //
                function(data){
                    console.log(data);
                    if(data.success){
                        genAlert('修改完成', 'success');
                    }else{
                        genAlert(data.error);
                    }
            //轉換json
            }, 'json');
        }
    }
</script>
<?php include __DIR__. '/parts/html.foot.php'; ?>


