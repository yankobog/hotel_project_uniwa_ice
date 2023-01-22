# hotel_project_uniwa_ice<br />
<h2>Hotel Showcase and Reservation Site</h2><br />
<br />
![Homepage screenshot](screenshots/homepage.png)<br/>
<h3><b>Οδηγίες εγκατάστασης</b></h3><br />
Κατά την υλοποίηση χρησιμοποιήσαμε το XAMPP v3.3.0. Για να τρέξετε το site, <br />
  1)	Τοποθετήστε τον φάκελο hotel στον φάκελο htdocs στην τοποθεσία εγκατάστασης του XAMPP.<br />
      π.χ. C:\xampp\htdocs\hotel<br />
  2)	Δημιουργήστε μια βάση δεδομένων στο phpMyAdmin με όνομα hotel_db και κάνουμε εισαγωγή το αρχείο hotel_db.sql που βρίσκεται στον υποφάκελο sql από τον φάκελο hotel.<br />
  3)	Τέλος μπορούμε να δούμε την σελίδα στο localhost/hotel το οποίο φορτώνει το index.php<br />
  *) Ο λογαριασμός του admin στο site είναι (username:password) -> admin:admin<br />
<br />
<br />
<h3>Ιεραρχία αρχείων και η συνοπτική λειτουργεία τους</h3><br />
<b>1)	hotel		: Αρχικός κατάλογος</b><br />
<ul>
<li> a.	admin.php			: Σελίδα/Πάνελ διαχειριστή (admin)<br />
<li> b.	admin_login.php		: Σελίδα σύνδεσης για διαχειριστές (admin)<br />
<li> c.	admin_registration.php	: Σελίδα εγγραφής για διαχειριστές (admin)<br />
<li> d.	admin_reservation_sent.php	: Σελίδα με ρουτίνες διαχείρισης εγγραφών (admin)<br />
<li> e.	contact.php			: Σελίδα με φόρμα επικοινωνίας<br />
<li> f.	contact_sent.php		: Σελίδα με ρουτίνα αποστολής μηνυμάτων<br />
<li> g.	dashboard.php			: Σελίδα/Πάνελ απλού χρήστη<br />
<li> h.	delete_msg.php		: Ρουτίνα διαγραφής μηνυμάτων (admin)<br />
<li> i.	delete_res.php			: Ρουτίνα διαγραφής εγγραφών (admin)<br />
<li> j.	index.php			: Αρχική Σελίδα<br />
<li> k.	login.php			: Σελίδα σύνδεσης για απλούς χρήστες<br />
<li> l.	registration.php		: Σελίδα εγγραφής για απλούς χρήστες<br />
<li> m.	reservation.php		: Σελίδα κράτησης<br />
<li> n.	reservation_sent.php		: Σελίδα με ρουτίνα αποστολής κρατήσεων<br />
<li> o.	rooms.php			: Σελίδα παρουσίασης δωματίων<br />
<li> p.	style.css			: CSS Styling αρχείο<br />
</ul>
<b>2)	hotel/images 	: Θέση φωτογραφιών και εικαστικών για το site</b><br />
<b>3)	hotel/includes	: Βοηθητικά αρχεία και ρουτίνες php χωρίς δικιά τους σελίδα</b><br />
<ul>
<li>  a.	admin_auth_session.php	: Έλεγχος ενεργού session για διαχειριστές (admin)<br />
<li>  b.	admin_logout.php		: Αποσύνδεση για διαχειριστές (admin)<br />
<li>  c.	auth_session.php		: Έλεγχος ενεργού session για απλούς χρήστες<br />
<li>  d.	db.php				: Σελίδα σύνδεσης και ρυθμίσεων Β.Δ.<br />
<li>  e.	footer.php			: Υποσέλιδο<br />
<li>  f.	logout.php			: Αποσύνδεση για απλούς χρήστες<br />
<li>  g.	navigation.php			: Μενού κεφαλίδας<br />
<li>  h.	rooms-showcase.php		: Παρουσίαση δωματίων<br />
<li>  i.	section-bedroom.php		: Τμήμα αρχικής σελίδας<br />
<li>  j.	section-reception.php		: Τμήμα αρχικής σελίδας<br />
<li>  k.	section-restaurant.php		: Τμήμα αρχικής σελίδας<br />
<li>  l.	section-sauna.php		: Τμήμα αρχικής σελίδας<br />
<li>  m.	userbar.php			: Μενού κεφαλίδας για σελίδες του χρήστη<br />
</ul>
<b>4)	hotel/js		: Θέση βιβλιοθήκης JavaScript</b><br />
<ul>
<li>  a.	jquery-1.7.2.min.js		: Συμπιεσμένη βιβλιοθήκη JavaScript<br />
</ul>
<b>5)	hotel/sql	: Θέση αρχείων SQL</b><br />
<ul>
<li>  a.	hotel_db.sql			: Κώδικας Βάσης Δεδομένων<br />
</ul> 
<br /> 
Το site είναι γραμμένο εξ ολοκλήρου σε php/html με τμηματικά JavaScript καθώς και πλήρες CSS. <br />
Εξαίρεση αποτελεί η JavaScript βιβλιοθήκη jquery-1.7.2.min.js. <br />
Το site έχει όλα τα αρχεία τοπικά και είναι ανεξάρτητο από σύνδεση στο διαδίκτυο. (όπως εικόνες και js)<br />
<br />
<h4><b>Αποποίηση Ευθυνών</b></h4><br />
Όλα τα εικαστικά του site δεν έχουν δημιουργηθεί ή ανήκουν σε μένα. <br />
Οι εικόνες βρέθηκαν μέσω google για τον σκοπό της άσκησης και το λογότυπο δημιουργήθηκε από την online δωρεάν υπηρεσία looka.com<br />

