# hotel_project_uniwa_ice
Hotel Showcase and Reservation Site

Οδηγίες εγκατάστασης
Κατά την υλοποίηση χρησιμοποιήσαμε το XAMPP v3.3.0. Για να τρέξετε το site, 
  1)	Τοποθετήστε τον φάκελο hotel στον φάκελο htdocs στην τοποθεσία εγκατάστασης του XAMPP.
      π.χ. C:\xampp\htdocs\hotel
  2)	Δημιουργήστε μια βάση δεδομένων στο phpMyAdmin με όνομα hotel_db και κάνουμε εισαγωγή το αρχείο hotel_db.sql που βρίσκεται στον υποφάκελο sql από τον φάκελο hotel.
  3)	Τέλος μπορούμε να δούμε την σελίδα στο localhost/hotel το οποίο φορτώνει το index.php
  *) Ο λογαριασμός του admin στο site είναι (username:password) -> admin:admin


Ιεραρχία αρχείων και η συνοπτική λειτουργεία τους
1)	hotel		: Αρχικός κατάλογος
  a.	admin.php			: Σελίδα/Πάνελ διαχειριστή (admin)
  b.	admin_login.php		: Σελίδα σύνδεσης για διαχειριστές (admin)
  c.	admin_registration.php	: Σελίδα εγγραφής για διαχειριστές (admin)
  d.	admin_reservation_sent.php	: Σελίδα με ρουτίνες διαχείρισης εγγραφών (admin)
  e.	contact.php			: Σελίδα με φόρμα επικοινωνίας
  f.	contact_sent.php		: Σελίδα με ρουτίνα αποστολής μηνυμάτων
  g.	dashboard.php			: Σελίδα/Πάνελ απλού χρήστη
  h.	delete_msg.php		: Ρουτίνα διαγραφής μηνυμάτων (admin)
  i.	delete_res.php			: Ρουτίνα διαγραφής εγγραφών (admin)
  j.	index.php			: Αρχική Σελίδα
  k.	login.php			: Σελίδα σύνδεσης για απλούς χρήστες
  l.	registration.php		: Σελίδα εγγραφής για απλούς χρήστες
  m.	reservation.php		: Σελίδα κράτησης
  n.	reservation_sent.php		: Σελίδα με ρουτίνα αποστολής κρατήσεων
  o.	rooms.php			: Σελίδα παρουσίασης δωματίων
  p.	style.css			: CSS Styling αρχείο
2)	hotel/images 	: Θέση φωτογραφιών και εικαστικών για το site
3)	hotel/includes	: Βοηθητικά αρχεία και ρουτίνες php χωρίς δικιά τους σελίδα
  a.	admin_auth_session.php	: Έλεγχος ενεργού session για διαχειριστές (admin)
  b.	admin_logout.php		: Αποσύνδεση για διαχειριστές (admin)
  c.	auth_session.php		: Έλεγχος ενεργού session για απλούς χρήστες
  d.	db.php				: Σελίδα σύνδεσης και ρυθμίσεων Β.Δ.
  e.	footer.php			: Υποσέλιδο
  f.	logout.php			: Αποσύνδεση για απλούς χρήστες
  g.	navigation.php			: Μενού κεφαλίδας
  h.	rooms-showcase.php		: Παρουσίαση δωματίων
  i.	section-bedroom.php		: Τμήμα αρχικής σελίδας
  j.	section-reception.php		: Τμήμα αρχικής σελίδας
  k.	section-restaurant.php		: Τμήμα αρχικής σελίδας
  l.	section-sauna.php		: Τμήμα αρχικής σελίδας
  m.	userbar.php			: Μενού κεφαλίδας για σελίδες του χρήστη
4)	hotel/js		: Θέση βιβλιοθήκης JavaScript
  a.	jquery-1.7.2.min.js		: Συμπιεσμένη βιβλιοθήκη JavaScript
5)	hotel/sql	: Θέση αρχείων SQL
  a.	hotel_db.sql			: Κώδικας Βάσης Δεδομένων
  
Το site είναι γραμμένο εξ ολοκλήρου σε php/html με τμηματικά JavaScript καθώς και πλήρες CSS. 
Εξαίρεση αποτελεί η JavaScript βιβλιοθήκη jquery-1.7.2.min.js. 
Το site έχει όλα τα αρχεία τοπικά και είναι ανεξάρτητο από σύνδεση στο διαδίκτυο. (όπως εικόνες και js)

Αποποίηση Ευθυνών
Όλα τα εικαστικά του site δεν έχουν δημιουργηθεί ή ανήκουν σε μένα. 
Οι εικόνες βρέθηκαν μέσω google για τον σκοπό της άσκησης και το λογότυπο δημιουργήθηκε από την online δωρεάν υπηρεσία looka.com

