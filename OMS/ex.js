function generateOTP(){
    var digits = '0123456789';
    let OTP ='';
    for(let i=0;i<6;i++){
        OTP += digits[Math.floor(Math.random() * 10)];
    }
    return OTP;
}
 generateOTP()
 generateOTP()

 console.log("Random Number Generator!", generateOTP(6) );