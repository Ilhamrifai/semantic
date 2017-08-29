<?php

namespace Sastrawi\StopWordRemover;

use Sastrawi\Dictionary\ArrayDictionary;

class StopWordRemoverFactory
{
    public function createStopWordRemover()
    {
        $stopWords = $this->getStopWords();

        $dictionary = new ArrayDictionary($stopWords);
        $stopWordRemover = new StopWordRemover($dictionary);

        return $stopWordRemover;
    }

    public function getStopWords()
    {
        /*return array(
            'yang', 'untuk', 'pada', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia', 'dua',
            'ia', 'seperti', 'jika', 'jika', 'sehingga', 'kembali', 'dan', 'tidak', 'ini', 'karena',
            'kepada', 'oleh', 'saat', 'harus', 'sementara', 'setelah', 'belum', 'kami', 'sekitar',
            'bagi', 'serta', 'di', 'dari', 'telah', 'sebagai', 'masih', 'hal', 'ketika', 'adalah',
            'itu', 'dalam', 'bisa', 'bahwa', 'atau', 'hanya', 'kita', 'dengan', 'akan', 'juga',
            'ada', 'mereka', 'sudah', 'saya', 'terhadap', 'secara', 'agar', 'lain', 'anda',
            'begitu', 'mengapa', 'kenapa', 'yaitu', 'yakni', 'daripada', 'itulah', 'lagi', 'maka',
            'tentang', 'demi', 'dimana', 'kemana', 'pula', 'sambil', 'sebelum', 'sesudah', 'supaya',
            'guna', 'kah', 'pun', 'sampai', 'sedangkan', 'selagi', 'sementara', 'tetapi', 'apakah',
            'kecuali', 'sebab', 'selain', 'seolah', 'seraya', 'seterusnya', 'tanpa', 'agak', 'boleh',
            'dapat', 'dsb', 'dst', 'dll', 'dahulu', 'dulunya', 'anu', 'demikian', 'tapi', 'ingin',
            'juga', 'nggak', 'mari', 'nanti', 'melainkan', 'oh', 'ok', 'seharusnya', 'sebetulnya',
            'setiap', 'setidaknya', 'sesuatu', 'pasti', 'saja', 'toh', 'ya', 'walau', 'tolong',
            'tentu', 'amat', 'apalagi', 'bagaimanapun','sedang'
        );*/
        return array("a", "about", "above", "acara", "across", "ada", "adalah", "adanya", "after",
        "afterwards", "again", "against", "agar", "akan", "akhir", "akhirnya", "akibat", "aku", "all",
        "almost", "alone", "along", "already", "also", "although", "always", "am", "among", "amongst",
        "amoungst", "amount", "an", "and", "anda", "another", "antara", "any", "anyhow", "anyone", "anything",
        "anyway", "anywhere", "apa", "apakah", "apalagi", "are", "around", "as", "asal", "at", "atas", "atau", "awal",
        "b", "back", "badan", "bagaimana", "bagi", "bagian", "bahkan", "bahwa", "baik", "banyak", "barang", "barat",
        "baru", "bawah", "be", "beberapa", "became", "because", "become", "becomes", "becoming", "been", "before",
        "beforehand", "begitu", "behind", "being", "belakang", "below", "belum", "benar", "bentuk", "berada",
        "berarti", "berat", "berbagai", "berdasarkan", "berjalan", "berlangsung", "bersama", "bertemu", "besar",
        "beside", "besides", "between", "beyond", "biasa", "biasanya", "bila", "bill", "bisa", "both", "bottom",
        "bukan", "bulan", "but", "by", "call", "can", "cannot", "cant", "cara", "co", "con", "could", "couldnt",
        "cry", "cukup", "dalam", "dan", "dapat", "dari", "datang", "de", "dekat", "demikian", "dengan", "depan",
        "describe", "detail", "di", "dia", "diduga", "digunakan", "dilakukan", "diri", "dirinya", "ditemukan",
        "do", "done", "down", "dua", "due", "dulu", "during", "each", "eg", "eight", "either", "eleven", "else",
        "elsewhere", "empat", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything",
        "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former",
        "formerly", "forty", "found", "four", "from", "front", "full", "further", "gedung", "get", "give", "go",
        "had", "hal", "hampir", "hanya", "hari", "harus", "has", "hasil", "hasnt", "have", "he", "hence", "her",
        "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "hidup", "him", "himself", "hingga",
        "his", "how", "however", "hubungan", "hundred", "ia", "ie", "if", "ikut", "in", "inc", "indeed", "ingin", "ini",
        "interest", "into", "is", "it", "its", "itself", "itu", "jadi", "jalan", "jangan", "jauh", "jelas", "jenis",
        "jika", "juga", "jumat", "jumlah", "juni", "justru", "juta", "kalau", "kali", "kami", "kamis", "karena",
        "kata", "katanya", "ke", "kebutuhan", "kecil", "kedua", "keep", "kegiatan", "kehidupan", "kejadian", "keluar",
        "kembali", "kemudian", "kemungkinan", "kepada", "keputusan", "kerja", "kesempatan", "keterangan", "ketiga",
        "ketika", "khusus", "kini", "kita", "kondisi", "kurang", "lagi", "lain", "lainnya", "lalu", "lama",
        "langsung", "lanjut", "last", "latter", "latterly", "least", "lebih", "less", "lewat", "lima", "ltd", "luar",
        "made", "maka", "mampu", "mana", "mantan", "many", "masa", "masalah", "masih", "masing-masing", "masuk",
        "mau", "maupun", "may", "me", "meanwhile", "melakukan", "melalui", "melihat", "memang", "membantu", "membawa",
        "memberi", "memberikan", "membuat", "memiliki", "meminta", "mempunyai", "mencapai", "mencari", "mendapat",
        "mendapatkan", "menerima", "mengaku", "mengalami", "mengambil", "mengatakan", "mengenai", "mengetahui",
        "menggunakan", "menghadapi", "meningkatkan", "menjadi", "menjalani", "menjelaskan", "menunjukkan",
        "menurut", "menyatakan", "menyebabkan", "menyebutkan", "merasa", "mereka", "merupakan", "meski", "might",
        "milik", "mill", "mine", "minggu", "misalnya", "more", "moreover", "most", "mostly", "move", "much", "mulai",
        "muncul", "mungkin", "must", "my", "myself", "nama", "name", "namely", "namun", "nanti", "neither", "never",
        "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere",
         "of", "off", "often", "oleh", "on", "once", "one", "only", "onto", "or", "orang", "other", "others",
         "otherwise", "our", "ours", "ourselves", "out", "over", "own", "pada", "padahal", "pagi", "paling",
         "panjang", "para", "part", "pasti", "pekan", "penggunaan", "penting", "per", "perhaps", "perlu", "pernah",
         "persen", "pertama", "pihak", "please", "posisi", "program", "proses", "pula", "pun", "punya", "put", "rabu",
         "rasa", "rather", "re", "ribu", "ruang", "saat", "sabtu", "saja", "salah", "sama", "same", "sampai", "sangat",
         "satu", "saya", "sebab", "sebagai", "sebagian", "sebanyak", "sebelum", "sebelumnya", "sebenarnya", "sebesar",
         "sebuah", "secara", "sedang", "sedangkan", "sedikit", "see", "seem", "seemed", "seeming", "seems", "segera",
         "sehingga", "sejak", "sejumlah", "sekali", "sekarang", "sekitar", "selain", "selalu", "selama", "selasa",
         "selatan", "seluruh", "semakin", "sementara", "sempat", "semua", "sendiri", "senin", "seorang", "seperti",
         "sering", "serious", "serta", "sesuai", "setelah", "setiap", "several", "she", "should", "show", "side",
         "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes",
         "somewhere", "still", "suatu", "such", "sudah", "sumber", "system", "tahu", "tahun", "tak", "take", "tampil",
         "tanggal", "tanpa", "tapi", "telah", "teman", "tempat", "ten", "tengah", "tentang", "tentu", "terakhir",
         "terhadap", "terjadi", "terkait", "terlalu", "terlihat", "termasuk", "ternyata", "tersebut", "terus",
         "terutama", "tetapi", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there",
         "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third",
         "this", "those", "though", "three", "through", "throughout", "thru", "thus", "tidak", "tiga", "tinggal",
         "tinggi", "tingkat", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "ujar",
         "umum", "un", "under", "until", "untuk", "up", "upaya", "upon", "us", "usai", "utama", "utara", "very", "via",
         "waktu", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where",
         "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while",
         "whither", "who", "whoever", "whole", "whom", "whose", "why", "wib", "will", "with", "within",
         "without", "would", "ya", "yaitu", "yakni", "yang", "yet", "you", "your", "yours", "yourself", "yourselves");
    }
}
