<?php include_once('header.php'); ?>

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Proces
            <span class="text-primary">ETL</span>
          </h1>
          <div class="subheading mb-5">Projekt przygotowany na przedmiot <strong>hurtownie danych</strong> ·
            <a href="https://e-uczelnia.uek.krakow.pl/course/view.php?id=1043" target="_blank">mgr Katarzyna Wójcik</a>
          </div>
          <p class="lead">Projekt wykonany przez:</p>
          <ul>
            <li>Michał Kowalik</li>
            <li>Agnieszka Chlebda</li>
            <li>Dawid Łysiak</li>
          </ul>
          <p class="mt-5">
            <a href="https://github.com/klapaucius4/ETL-Process" target="_blank" title="Repozytorium w serwisie Github">
              <i class="fab fa-github-square fa-4x"></i>
            </a>
          </p>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="documentation">
        <div class="my-auto">
          <h2 class="mb-5">Dokumentacja techniczna</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-5">Do pobrania</h3>
              <!-- <div class="subheading mb-3">Intelitec Solutions</div> -->
              <a href="Dokumentacja-techniczna.pdf" class="btn btn-primary" download>Dokumentacja techniczna</a>
              <!-- <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p> -->
            </div>
          </div>


        </div>

      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="instruction">
        <div class="my-auto">
          <h2 class="mb-5">Instrukcja obsługi</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-5">Do pobrania</h3>
              <a href="Instrukcja-obslugi.pdf" class="btn btn-success" download>Instrukcja obsługi</a>
            </div>
          </div>


        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="application">
        <div class="my-auto">
          <h2 class="mb-5">Aplikacja</h2>

          <hr />

          <div class="subheading mb-3">Wykonanie proceus ETL w całości</div>

          <a href="/etl/etlFull.php" class="btn btn-warning">Wykonaj proces ETL</a>

          <hr />

          <div class="subheading mb-3">Wykonaj proces ETL oddzielnie</div>
          <ul class="fa-ul m-0 list-inline">
            <li class="my-1 list-inline-item">
              <a href="/etl/extract.php" class="btn btn-info">E (extract)</a>
            </li>
            <li class="my-1 list-inline-item">
              <a href="/etl/transform.php" class="btn btn-secondary">T (transform)</a>
            </li>
            <li class="my-1 list-inline-item">
              <a href="/etl/load.php" class="btn btn-success">L (load)</a>
            </li>
          </ul>


          <hr />

          <div class="subheading mb-3">Zarządzanie danymi w bazie</div>
          <a href="/etl/showDataFromDatabase.php" class="btn btn-primary">Zobacz dane w bazie</a>
          <a href="/etl/downloadCSV.php" class="btn btn-dark">Pobierz dane w formacie CSV</a>
          <a href="/etl/deleteDatabase.php" class="btn btn-danger" onclick="return confirm('Czy jesteś pewny, że chcesz usunąć bazę danych?')">Wyczyść bazę danych</a>
        </div>
      </section>

      <hr class="m-0">


<?php include_once('footer.php') ?>