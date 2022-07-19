# 公告欄系統
  API URL : user/demo_billboard
  
  API methon: GET
# 目的
  透過XAMPP(Apache&MySQL)架設公告欄系統，建立使用者帳號，提供公發布、修改以及刪除。
# 資料表設計
  1.	管理者資料(編號、使用者帳號、使用者密碼、註冊日期時間)
  2.	2.	布告資料(編號、主題、內容、使用者、最後日期時間)
# 流程設計
  1.	系統設定檔：steup.php；確認與資料庫連結、固定之變數or參數
  2.	管理者資料建立：user.php&user_check.php；確認輸入資料是否正確、確認帳號是否有人使用。
  3.	公告瀏覽：browser.php&browser_list.php；確認所選擇隻某一則公告。
  4.	公告新增：insert.php&insert_check.php；確認輸入資料是否正確、確認此帳號是否正確。
  5.	公告修改：modify.php & modify_check.php；確認所選擇隻某一折公告，並將資料呈現於輸入表號中。
  6.	公告刪除：delete.php &delete_check.php；確認所選擇，再次刪除資料無法救回。
 # 後端API介接
 1.	setup.php;確認資料庫狀態。
  2.	user_check.php;運用GET呼叫方式，首先判斷使用者帳戶以及密碼是否為空值以及長度是否小於4or超過8，第二步判斷是否重複註冊，如果上述有誤，將返回user.php並將問題陳述。如並未有誤將創建使用者帳戶。
  3.	browser_list.php;公告瀏覽表單，詳細公告資訊,並且提供瀏覽、修改以及刪除功能。
  4.	insert_check.php;第一先確認帳號以及密碼是否為系統使用者，如諾不是請重新輸入，第二確認輸入標題以及內容是否為空值，如諾不是將跳回insert.php，確認無誤後新增至資料庫中並且顯示公佈欄。
  5.	modify_check.php;第一確認使用者帳號是否存在，第二確認此帳號與此通告者是否相同，第三確認公告標題以及內容不是空值。
  6.	delete_check.php；第一確認使用者帳號是否存在，第二確認此帳號與此通告者是否相同，第三確認刪除公告編號。

