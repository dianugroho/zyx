// Task 1
console.log('Task 1 \n')
let daftarBuah = ["2. Apel", "5. Jeruk", "3. Anggur", "4. Semangka", "1. Mangga"];
daftarBuah.sort().map(fruit => console.log(fruit, '\n'));

// Task 2
let kalimat = "saya sangat senang belajar javascript";
console.log('\nTask 2 \n')
console.log(kalimat.split(' '));

// Task 3
let data = [
              {
                nama: 'strawberry',
                warna: 'merah',
                'ada bijinya': 'tidak',
                harga: 9000
              },
              {
                nama: 'jeruk',
                warna: 'oranye',
                'ada bijinya': 'ada',
                harga: 8000
              },
              {
                nama: 'Semangka',
                warna: 'Hijau & Merah',
                'ada bijinya': 'ada',
                harga: 10000
              },
              {
                nama: 'Pisang',
                warna: 'Kuning',
                'ada bijinya': 'tidak',
                harga: 5000
              }
           ]
console.log('\nTask 3 \n')
console.log(data[0]);