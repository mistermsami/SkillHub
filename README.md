## SkillHub

SkillHub is a Laravel 11 application that combines an e‑learning platform with a freelance marketplace.

- **E‑learning**: Courses, lessons (videos), enrollments, completion certificates.
- **Freelance marketplace**: Gigs, jobs, proposals, orders, ratings.
- **Accounts**: Student, Freelancer, Buyer with profile management and image uploads.

### Tech Stack
- **Backend**: PHP 8.2, Laravel ^11.9
- **Frontend tooling**: Vite 5, `laravel-vite-plugin`
- **Database**: MySQL (or any Laravel-supported DB)
- **Testing**: PHPUnit 11

---

## Project Structure
Key paths only:

- `app/Http/Controllers`: `Home`, `Student`, `Freelancer`, `Buyer`, `CourseController`
- `app/Models`: `User`, `Courses`, `courseLessons`, `courseEnrollments`, `courseCertificate`, `CourseCategory`, `Gigss`, `Job`, `Proposal`, `freelanceSeller`, `freelanceBuyer`, `freelanceCategory`, `eLearning`
- `database/migrations`: Schema for users, courses, e‑learning, gigs, jobs, proposals, messages, categories
- `resources/views`: Blade templates for `home`, `signin`, `signup`, `elearning/*`, `seller/*`, `buyer/*`
- `public/`: Uploaded assets (profile, course, gig images; course videos)

---

## Features
- **Public landing** with featured gigs, open jobs, categories, freelancers (`/`).
- **Auth flows**: Custom signup/signin in `Home` controller storing session data (no Breeze/Jetstream).
- **Students**: Browse courses, view details, enroll/start, track completion, profile settings.
- **Freelancers**: Create/manage gigs, proposals, orders, profile with skills and hourly rate.
- **Buyers**: Post/manage jobs, accept/decline proposals, mark orders complete and rate.
- **File uploads**: Images and videos stored under `public/` subfolders.

---

## Prerequisites
- PHP ≥ 8.2
- Composer
- Node.js ≥ 18 and npm
- A database (MySQL/MariaDB recommended)

---

## Getting Started

1. Clone and install dependencies
   ```bash
   composer install
   npm install
   ```

2. Environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Update DB connection in `.env`:
   - `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

3. Database
   ```bash
   php artisan migrate
   ```

4. Build frontend assets
   - Dev: `npm run dev`
   - Prod: `npm run build`

5. Run the app
   ```bash
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000`.

---

## Routes Overview
High-level (see `routes/web.php` for full list):

- **Home**: `GET /` → `Home@home`
- **Auth**: `POST /signupskillhub`, `POST /signinskillhub`, `GET /logout`
- **Student**:
  - `GET /student` (courses), `GET /student/coursedetails/{id}`
  - `GET /student/regstartcourse/{id}`, `GET /student/startcourse/{id}`
  - `GET /student/coursecomplete/{id}`
  - `GET /studentdetails`, `GET /profilesetting`, `POST /studentprofileupdate`
- **Freelancer**:
  - `GET /seller` (dashboard)
  - `GET /creategig`, `POST /storeGig`, `GET /managegigs`, `GET /freelancersgig`
  - `GET /myproposals`, `GET /sellerorders`
  - `POST /ordercompleted/{proposalId}/{jobid}`
  - `GET /sellerprofilesetting`, `POST /sellerprofileupdate`
  - `GET /freelancers`, `GET /freelancerdetails/{freelancerid}`, `GET /gigdetails/{gigid}`
- **Buyer**:
  - `GET /buyer` (dashboard)
  - `GET /createjob`, `POST /storeJob`, `GET /managejobs`, `GET /buyersjobs`
  - `GET /jobdetails/{jobid}`, `POST /storeproposal/{jobid}`
  - `POST /acceptProposal/{proposalId}/{jobid}`, `POST /declineProposal/{proposalId}`
  - `POST /ordercompleterequest/{proposalId}/{jobid}`
  - `GET /myorderslist`, `GET /buyerprofilesettings`, `POST /buyerprofileupdate`, `GET /buyerdetails/{buyerid}`

---

## Data and Uploads
Uploads are saved under `public/` and served directly:

- `public/profile_images/` – user avatars
- `public/course_images/` – course thumbnails
- `public/course_videos/` – lesson videos
- `public/gig_images/` – gig thumbnails
- `public/worksubmit/` – delivered work files

Ensure your web server is configured to serve the `public/` directory as the document root.

---

## Development Notes
- Session-based auth and role selection are handled in `Home@signinskillhub` and stored in session keys: `GU_id`, `studentId`, `freelancerId`, `buyerId`.
- Controllers eager-load related models to reduce N+1 queries.
- Validation is applied on all major forms (jobs, gigs, courses, lessons, profiles).

---

## Testing
```bash
phpunit
```

---

## License
This project is open-sourced software licensed under the MIT license.
