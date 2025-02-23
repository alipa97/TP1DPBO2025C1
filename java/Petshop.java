public class Petshop {
    private int id;
    private String nama;
    private String kategori;
    private int harga;

    // Konstruktor
    public Petshop(int id, String nama, String kategori, int harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
    }

    // Getter dan Setter
    public int get_id() {
        return id;
    }

    public void set_id(int id) {
        this.id = id;
    }

    public String get_nama() {
        return nama;
    }

    public void set_nama(String nama) {
        this.nama = nama;
    }

    public String get_kategori() {
        return kategori;
    }

    public void set_kategori(String kategori) {
        this.kategori = kategori;
    }

    public int get_harga() {
        return harga;
    }

    public void set_harga(int harga) {
        this.harga = harga;
    }
}
