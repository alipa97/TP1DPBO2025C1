import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void main(String[] args){
        ArrayList<Petshop> listProduct = new ArrayList<>();
        Scanner input = new Scanner(System.in);
        int id_count = 1;

        while (true) {
            System.out.println("+-------------+");
            System.out.println("| Daftar Menu |");
            System.out.println("+-------------+");
            System.out.println("1. Show Produk");
            System.out.println("2. Add Produk");
            System.out.println("3. Edit Produk");
            System.out.println("4. Delete Produk");
            System.out.println("5. Find Produk");
            System.out.println("0. Exit\n");
            System.out.print("Masukkan pilihan menu: ");
            String pilihan = input.nextLine();

            switch (pilihan) {
                case "1":
                    System.out.println("\n+------------------------+");
                    System.out.println("| Daftar Produk Pet Shop |");
                    System.out.println("+------------------------+\n");

                    if (listProduct.isEmpty()) {
                        System.out.println("== Tidak ada produk tersedia ==\n");
                    } else {
                        for (Petshop p : listProduct) {
                            int id = p.get_id();
                            String nama = p.get_nama();
                            String kategori = p.get_kategori();
                            int harga = p.get_harga();

                            System.out.println("ID: " + id);
                            System.out.println("Nama: " + nama);
                            System.out.println("Kategori: " + kategori);
                            System.out.println("Harga: " + harga);
                            System.out.println("\n+------------------------+\n");
                        }
                    }
                    break;

                case "2":
                    System.out.print("Nama: ");
                    String nama = input.nextLine();
                    System.out.print("Kategori: ");
                    String kategori = input.nextLine();
                    System.out.print("Harga: ");
                    int harga = input.nextInt();
                    input.nextLine(); // Membuang newline

                    listProduct.add(new Petshop(id_count, nama, kategori, harga));
                    id_count++;
                    System.out.println("== Produk berhasil ditambahkan! ==\n");
                    break;

                case "3":
                    System.out.print("Masukkan ID produk yang ingin diubah: ");
                    int ubah = input.nextInt();
                    input.nextLine(); // Membuang newline
                    boolean found = false;

                    for (Petshop p : listProduct) {
                        if (p.get_id() == ubah) {
                            System.out.print("Nama: ");
                            p.set_nama(input.nextLine());
                            System.out.print("Kategori: ");
                            p.set_kategori(input.nextLine());
                            System.out.print("Harga: ");
                            p.set_harga(input.nextInt());
                            input.nextLine(); // Membuang newline

                            System.out.println("== Produk berhasil diubah! ==\n");
                            found = true;
                            break;
                        }
                    }

                    if (!found) {
                        System.out.println("== Produk tidak ditemukan ==\n");
                    }
                    break;

                case "4":
                    System.out.print("Masukkan ID produk yang ingin dihapus: ");
                    int hapus = input.nextInt();
                    input.nextLine(); // Membuang newline
                    found = false;

                    for (int i = 0; i < listProduct.size(); i++) {
                        if (listProduct.get(i).get_id() == hapus) {
                            listProduct.remove(i);
                            System.out.println("== Produk berhasil dihapus! ==\n");
                            found = true;
                            break;
                        }
                    }

                    if (!found) {
                        System.out.println("== Produk tidak ditemukan ==\n");
                    }
                    break;

                case "5":
                    System.out.print("Masukkan nama produk yang ingin dicari: ");
                    String cari = input.nextLine().toLowerCase();
                    found = false;

                    for (Petshop p : listProduct) {
                        if (p.get_nama().toLowerCase().contains(cari)) {
                            int id = p.get_id();
                            String nama_find = p.get_nama();
                            String kategori_find = p.get_kategori();
                            int harga_find = p.get_harga();

                            System.out.println("ID: " + id);
                            System.out.println("Nama: " + nama_find);
                            System.out.println("Kategori: " + kategori_find);
                            System.out.println("Harga: " + harga_find);
                            System.out.println("\n+------------------------+\n");
                            found = true;
                            break;
                        }
                    }

                    if (!found) {
                        System.out.println("== Produk tidak ditemukan ==\n");
                    }
                    break;

                case "0":
                    System.out.println("== Terima kasih sudah mencoba layanan kami! ==");
                    input.close();
                    return;

                default:
                    System.out.println("== Pilihan tidak valid ==\n");
                    break;
            }
        }
    }
}