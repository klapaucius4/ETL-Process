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
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="documentation">
        <div class="my-auto">
          <h2 class="mb-5">Dokumentacja</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-5">Do pobrania</h3>
              <!-- <div class="subheading mb-3">Intelitec Solutions</div> -->
              <a href="dokumentacja.pdf" class="btn btn-primary" download>Dokumentacja</a>
              <!-- <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p> -->
            </div>
            <!-- <div class="resume-date text-md-right">
              <span class="text-primary">March 2013 - Present</span>
            </div> -->
          </div>

          <!-- <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Web Developer</h3>
              <div class="subheading mb-3">Intelitec Solutions</div>
              <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">December 2011 - March 2013</span>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Junior Web Designer</h3>
              <div class="subheading mb-3">Shout! Media Productions</div>
              <p>Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">July 2010 - December 2011</span>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Web Design Intern</h3>
              <div class="subheading mb-3">Shout! Media Productions</div>
              <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">September 2008 - June 2010</span>
            </div>
          </div> -->

        </div>

      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="instruction">
        <div class="my-auto">
          <h2 class="mb-5">Instrukcja obsługi</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-5">Do pobrania</h3>
              <a href="instrukcja.pdf" class="btn btn-success" download>Instrukcja</a>
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

          <a href="#" class="btn btn-warning">Wykonaj proces ETL</a>

          <hr />

          <div class="subheading mb-3">Wykonaj proces ETL oddzielnie</div>
          <ul class="fa-ul m-0">
            <li class="my-1">
              <a href="/etl/extract.php" target="_blank" class="btn btn-info">E (extract)</a>
            </li>
            <li class="my-1">
              <a href="/etl/transform.php" target="_blank" class="btn btn-secondary">T (transform)</a>
            </li>
            <li class="my-1">
              <a href="/etl/load.php" target="_blank" class="btn btn-success">L (load)</a>
            </li>
          </ul>


          <hr />

          <div class="subheading mb-3">Wyczyść bazę</div>
          <a href="#" class="btn btn-danger">Czyszczenie bazy</a>
        </div>
      </section>

      <hr class="m-0">


<?php include_once('footer.php') ?>