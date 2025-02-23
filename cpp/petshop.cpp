#include <iostream>
#include <vector>
#include <iomanip>
#include <string>
using namespace std;

// Struktur data untuk menyimpan informasi produk
class Product {
public:
    int id;
    string nama; // nama produk
    string kategori; //kategori produk (makanan, aksesoris, etc)
    int harga; // harga produk

    Product(int id, string nama, string kategori, int harga) {
        this->id = id;
        this->nama = nama;
        this->kategori = kategori;
        this->harga = harga;
    }
};

// Kelas utama untuk mengelola data PetShop
class PetShop {
private:
    vector<Product> produkList;
    int nextId = 1;

public:
    // Menampilkan data yang tersedia
    void tampilkan_produk() {
        if (produkList.empty()) {
            cout << "== Tidak ada produk tersedia ==\n";
            return;
        }
        cout << "+----+-------------------------+--------------+---------+\n";
        cout << "| ID |       Nama Produk       |   Kategori   |  Harga  |\n";
        cout << "+----+-------------------------+--------------+---------+\n";
        // Menampilkan data produk
        for (const auto &produk : produkList) {
            cout << "| " << setw(2) << produk.id << " | " 
                << setw(23) << left << produk.nama << " | " 
                << setw(12) << left << produk.kategori << " | " 
                << setw(7) << right << produk.harga << " |\n";
        }
        cout << "+----+-------------------------+--------------+---------+\n";
    }

    // Menambahkan produk baru
    void tambah_produk(string nama, string kategori, int harga) {
        produkList.push_back(Product(nextId++, nama, kategori, harga));
        cout << "== Produk berhasil ditambahkan! ==\n";
    }

    // Mengubah produk berdasarkan ID
    void ubah_produk(int id, string namaBaru, string kategoriBaru, int hargaBaru) {
        for (auto &produk : produkList) {
            if (produk.id == id) {
                produk.nama = namaBaru;
                produk.kategori = kategoriBaru;
                produk.harga = hargaBaru;
                cout << "== Produk berhasil diubah| ==\n";
                return;
            }
        }
        cout << "== Produk dengan ID " << id << " tidak ditemukan ==\n";
    }

    // Menghapus produk berdasarkan ID
    void hapus_produk(int id) {
        for (auto it = produkList.begin(); it != produkList.end(); ++it) {
            if (it->id == id) {
                produkList.erase(it);
                cout << "== Produk berhasil dihapus! ==\n";
                return;
            }
        }
        cout << "== Produk dengan ID " << id << " tidak ditemukan ==\n";
    }

    // Mencari produk berdasarkan nama
    void cari_produk(string nama) {
        bool ditemukan = false;
        for (const auto &produk : produkList) {
            if (produk.nama == nama) {
                cout << "== Produk ditemukan ==\n";
                cout << "ID       :" << produk.id << "\n";
                cout << "Nama     :" << produk.nama << "\n";
                cout << "Kategori : " << produk.kategori << "\n";
                cout << "Harga    : Rp " << produk.harga << "\n";
                ditemukan = true;
            }
        }
        if (!ditemukan) {
            cout << "== Produk dengan nama " << nama << " tidak ditemukan ==\n";
        }
    }
};
