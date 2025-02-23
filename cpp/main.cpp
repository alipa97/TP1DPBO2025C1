#include "petshop.cpp"

int main() {
    PetShop toko;
    int pilihan;

    do {
        // Menampilkan daftar menu
        cout << "+--------------+\n";
        cout << "| Menu PetShop |";
        cout << "\n+--------------+\n";
        cout << "1. Show Produk\n";
        cout << "2. Add Produk\n";
        cout << "3. Edit Produk\n";
        cout << "4. Delete Produk\n";
        cout << "5. Find Produk\n";
        cout << "0. Exit\n\n";
        cout << "Masukkan pilihan menu: ";
        cin >> pilihan;

        if (pilihan == 1) {
            toko.tampilkan_produk();

        } else if (pilihan == 2) {
            string nama, kategori;
            double harga;
            cout << "Nama Produk: ";
            cin >> ws; getline(cin, nama);
            cout << "Masukkan Kategori: ";
            getline(cin, kategori);
            cout << "Masukkan Harga: ";
            cin >> harga;
            toko.tambah_produk(nama, kategori, harga);

        } else if (pilihan == 3) {
            int id;
            string nama, kategori;
            double harga;
            cout << "Masukkan ID produk yang ingin diubah: ";
            cin >> id;
            cout << "Masukkan Nama baru: ";
            cin >> ws; getline(cin, nama);
            cout << "Masukkan Kategori baru: ";
            getline(cin, kategori);
            cout << "Masukkan Harga baru: ";
            cin >> harga;
            toko.ubah_produk(id, nama, kategori, harga);

        } else if (pilihan == 4) {
            int id;
            toko.tampilkan_produk();
            cout << "Masukkan ID produk yang ingin dihapus: ";
            cin >> id;
            toko.hapus_produk(id);

        } else if (pilihan == 5) {
            string nama;
            cout << "Masukkan Nama produk yang dicari: ";
            cin >> ws; getline(cin, nama);
            toko.cari_produk(nama);

        }
        cout << "\n";
    } while (pilihan != 0);

    cout << "== Terima kasih sudah mencoba layanan kami! ==\n";
    return 0;
}
