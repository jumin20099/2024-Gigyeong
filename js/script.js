/**
 * 메인페이지 슬라이드(자동 슬라이드, 일시 정지, 재개 기능 구현)
 */

function carouselSlide() {
  const myCarouselElement = document.querySelector('#carouselExampleIndicators')
  const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 2000,
    pause: false,
  })
}

function pauseCarousel() {
  const myCarouselElement = document.querySelector('#carouselExampleIndicators')
  $(myCarouselElement).carousel('pause');
}

function playCarousel() {
  const myCarouselElement = document.querySelector('#carouselExampleIndicators')
  $(myCarouselElement).carousel('cycle');
}

function reservation() {
  async function fetchReservation() {
    const getReservationJSON = await fetch("../api/reservation.json");
    const reservationJSON = await getReservationJSON.json();
    console.log(reservationJSON["reservition"]);

    return reservationJSON["reservition"];
  }

  const resDateTableElem = document.querySelector("#resDateTable");
  for (let i = 0; i < 14; i++) {
    const date = new Date();
    date.setDate(date.getDate() + i);
    const year = date.getFullYear();
    const month = ("0" + (date.getMonth() + 1)).slice(-2);
    const day = ("0" + date.getDate()).slice(-2);
    const week = date.getDay();

    if (week == 0) {
      resDateTableElem.innerHTML += `<th id="D+${i}" class="sun">${year}.${month}.${day}</th>`;
    } else if (week == 6) {
      resDateTableElem.innerHTML += `<th id="D+${i}" class="sat">${year}.${month}.${day}</th>`;
    } else {
      resDateTableElem.innerHTML += `<th id="D+${i}">${year}.${month}.${day}</th>`;
    }
  }

  for (let i = 0; i < 14; i++) {
    for (let k = 0; k < 17; k++) {
      document.querySelector(`#row${k}`).innerHTML += `<td></td>`;
    }
  }

  async function updateReservation() {
    const reservation = await fetchReservation();

    for (let i = 0; i < 14; i++) {
      for (let k = 0; k < 17; k++) {
        const data = reservation[i][`D+${i}`][k]["status"];
        const tdElem = document.querySelector(
          `#row${k} > td:nth-of-type(${i + 1})`
        );

        if (data == "W") {
          tdElem.innerText = "●";
          tdElem.className = `W D+${i} ${k}`;
          tdElem.addEventListener("click", yaeyak);
        } else if (data == "R") {
          tdElem.innerText = "▲";
          tdElem.className = `R D+${i} ${k}`;
          tdElem.addEventListener("click", noYaeyak);
        } else {
          tdElem.innerText = "■";
          tdElem.className = `C D+${i} ${k}`;
          tdElem.addEventListener("click", noYaeyak);
        }
      }
    }
  }

  setInterval(() => {
    updateReservation();
  }, 5000);

  updateReservation();
};

function yaeyak() {

  const rowValue = this.classList[2];
  let position;
  if(rowValue <= 6) {
    position = "A" +  ("0" +(Number(rowValue) + 1)).slice(-2);
  } else {
    position = "T" + ("0" + (Number(rowValue) - 6)).slice(-2);
  }

  const weeks = document.getElementById(`${this.classList[1]}`);
  let week = ""
  if(weeks != null) {
      week = weeks.className;
  }

  // 아이디가 this.classList[1]인 Elem의 class 값을 가져와서 week 변수에 저장
  let price;

  if(week != ""){
      if(position.includes("A")){
          price = 30000;
          console.log("A 영역, 주말")
      } else {
          price = 20000;
          console.log("T 영역, 주말")
      }
  } else{
      if(position.includes("A")){
          price = 25000;
          console.log("A 영역, 평일")
      } else{
          price = 15000;
          console.log("T 영역, 평일")
      }
  }
  
  document.querySelector("#position").innerText = `자리 : ${position}`;
  document.querySelector("#price").innerText = `금액 : ${price.toLocaleString()}원`
  $("#exampleModalLive").modal("show");
}

// 휴대폰 번호 정규표현식으로 3-4-4 만들기
const regexPhoneNumber = (target) => {
  target.value = target.value.replace(/[^0-9]/g, "").replace(/^(\d{3})(\d{4})(\d{4})/, `$1-$2-$3`);
}

// 인증번호 정규표현식
const regexVerifyNumber = (target) => {
  target.value = target.value.replace(/[^0-9]/g, "");
}

function sendVerifyNumber() {
  if(document.getElementById("phoneNumber").value != null) {

      if(document.getElementById("phoneNumber").value.length == 13) {
          document.querySelector("#phoneVerify").disabled = false;
      } else{
          alert("휴대폰 번호를 확인해주세요")
      }
  }
}

function reservationSubmit() {
  const name = document.getElementById("name").value;
  const phoneNumber = document.getElementById("phoneNumber").value;
  const phoneVerify = document.getElementById("phoneVerify").value;

  if(!name){
      return alert("이름을 확인하여 주시기 바랍니다.")
  }
  if(phoneNumber.length != 13){
      return alert("전화번호를 확인하여 주시기 바랍니다.")
  }
  if(phoneVerify != "1234"){
      return alert("인증번호를 확인하여 주시기 바랍니다.")
  }
  $("#exampleModalLive").modal("hide");
  showToast()
}

function showToast(){
  const toastLiveExample = document.getElementById('liveToast')
  const toast = new bootstrap.Toast(toastLiveExample)
  toast.show();
}

function noYaeyak(){
  alert("예약할 수 없습니다.")
}

const babiqGrillprice = 10000;
const porkBabiqPrice = 12000;
const seafoodBabiqPrice = 15000;
const juicePrice = 3000;
const alcoholPrice = 5000;
const snackSetPrice = 4000;

const orderArr = [0, 0, 0, 0, 0, 0];
let totalPrice = 0;
let orderCount = 0;

function setPrice(product) {
  switch (product.id) {
      case 'babiqGrill':
          orderArr[0] = product.value;
      break;
      case 'porkBabiq':
          orderArr[1] = product.value;
      break;
      case 'seafoodBabiq':
          orderArr[2] = product.value;
      break;
      case 'juice':
          orderArr[3] = product.value;
      break;
      case 'alcohol':
          orderArr[4] = product.value;
      break;
      case 'snackSet':
          orderArr[5] = product.value;
      break;
  }
  const babiqGrillTotal = babiqGrillprice * orderArr[0]
  const porkBabiqTotal = porkBabiqPrice * orderArr[1]
  const seafoodBabiqTotal = seafoodBabiqPrice * orderArr[2]
  const juiceTotal = juicePrice * orderArr[3]
  const alcoholTotal = alcoholPrice * orderArr[4]
  const snackSetTotal = snackSetPrice * orderArr[5]
  totalPrice = babiqGrillTotal + porkBabiqTotal + seafoodBabiqTotal + juiceTotal + alcoholTotal + snackSetTotal;
  document.querySelector("#totalPrice").innerHTML = `총 주문 금액 : ${totalPrice.toLocaleString()}원`
} 

function orderModal() {
  $("#BabiqOrderModal").modal("show")
}

function orderSubmit() {
  $("#BabiqOrderModal").modal("hide");
  orderCount++;
  document.querySelector("#totalOrder").innerHTML = orderCount;
  if(totalPrice === 0){
    alert("주문한 상품이 없습니다.")
    document.querySelector("#totalOrder").innerHTML = 0;
    orderCount--;
  }
}