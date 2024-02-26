<?php
echo !isset($_SESSION["user_idx"]) ? "<script>alert('로그인 후 이용 가능합니다.'); location.href='/login';</script>" : null;
?>
    <table id="myPageTable">
        <tr class="myPageTr">
            <th class="myPageTh">예약 날짜</th>
            <th class="myPageTh">예약 자리</th>
            <th class="myPageTh">예약 상태</th>
            <th class="myPageTh">예약 취소</th>
            <th class="myPageTh">바비큐 주문하기</th>
            <th class="myPageTh">주문 건수</th>
            <th class="myPageTh">주문 내역 보기</th>
        </tr>
        <tr class="myPageTr">
            <td class="myPageTd">2024. 02. 15</td>
            <td class="myPageTd">A01</td>
            <td class="myPageTd">예약 완료</td>
            <td class="myPageTd"><button>예약 취소</button></td>
            <td class="myPageTd" onclick="orderModal()"><button>바비큐 주문하기</button></td>
            <td id="totalOrder" class="myPageTd">0</td>
            <td class="myPageTd"><button>주문 내역 보기</button></td>
        </tr>
    </table>

    <div class="modal fade" id="BabiqOrderModal" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">바비큐 주문하기</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>자리 : A01</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1 ">바비큐 그릴 대여(도구 및 숯 등 포함) / 1개 10,000원</span>
                        <input id="babiqGrill" type="number" class="form-control" placeholder="개수" aria-label="개수" value="0" aria-describedby="basic-addon1" max="1" min="0" oninput="setPrice(this)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">돼지고기 바비큐 세트 / 1인분 12,000원</span>
                        <input id="porkBabiq" type="number" class="form-control" placeholder="개수" aria-label="개수" value="0" aria-describedby="basic-addon1" min="0" oninput="setPrice(this)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">해산물 바비큐 / 세트 1인분 15,000원</span>
                        <input id="seafoodBabiq" type="number" class="form-control" placeholder="개수" aria-label="개수" value="0" aria-describedby="basic-addon1" min="0" oninput="setPrice(this)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">음료 1병 / 3,000원</span>
                        <input id="juice" type="number" class="form-control" placeholder="개수" aria-label="개수" value="0" aria-describedby="basic-addon1" min="0" oninput="setPrice(this)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">주류 1병 / 5,000원</span>
                        <input id="alcohol" type="number" class="form-control" placeholder="개수" aria-label="개수" value="0" aria-describedby="basic-addon1" min="0" oninput="setPrice(this)">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">과자 세트 1세트(3종) / 4,000원</span>
                        <input id="snackSet" type="number" class="form-control" placeholder="개수" aria-label="개수" value="0" aria-describedby="basic-addon1" min="0" oninput="setPrice(this)">
                    </div>
                </div>
                <div class="modal-footer">
                    <h5 id="totalPrice">총 주문 금액 : 0원</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                    <button type="button" class="btn btn-primary" onclick="orderSubmit()">주문하기</button>
                </div>
            </div>
        </div>
    </div>