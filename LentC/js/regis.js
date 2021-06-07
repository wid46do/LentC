const users=[
    {
        username:"nama", 
        password:"sandi",
    },
    {
        username:"name",
        password:"password",
    }
]

console.log("users sebelum daftar", users);

function daftar(event){
    event.preventDefault();

    const userBaru={
        username:event.target.username.value,
        password:event.target.password.value,
        namaLengkap:event.target.nama_lengkap.value,
    };
    users.push(userBaru)
    console.log("users setelah daftar", users);
    alert("user telah terdaftar")
}
const form=document.querySelector("form");
form.addEventListener("submit", daftar);