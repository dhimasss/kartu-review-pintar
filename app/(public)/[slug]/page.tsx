import { getLinkBySlug } from '@/lib/firestore/links';
import { notFound } from 'next/navigation';
import ActivationForm from './ActivationForm';
import { Suspense } from 'react';

interface PageProps {
  params: { slug: string };
}

async function LinkData({ slug }: { slug: string }) {
  const link = await getLinkBySlug(slug);
  
  if (!link) {
    notFound();
  }
  
  // Check if suspended
  if (link.isSuspended) {
    return (
      <div className="min-h-screen flex items-center justify-center bg-white px-4">
        <div className="w-full max-w-md animate-fade-up">
          <div className="card-solid p-6 sm:p-8 text-center">
            <div className="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 rounded-2xl mb-3 sm:mb-4 bg-google-red border-2 border-google-text shadow-google-sm">
              <svg className="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" viewBox="0 0 24 24" strokeWidth="2.5" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
              </svg>
            </div>
            <h1 className="text-2xl sm:text-3xl font-bold-display text-google-text mb-2">KARTU DITANGGUHKAN</h1>
            <p className="text-xs sm:text-sm text-gray-600">Kartu ini telah ditangguhkan. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
          </div>
        </div>
      </div>
    );
  }
  
  // Check if expired
  if (link.expiredAt && new Date(link.expiredAt) <= new Date()) {
    return (
      <div className="min-h-screen flex items-center justify-center bg-white px-4">
        <div className="w-full max-w-md animate-fade-up">
          <div className="card-solid p-6 sm:p-8 text-center">
            <div className="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 rounded-2xl mb-3 sm:mb-4 bg-google-yellow border-2 border-google-text shadow-google-sm">
              <svg className="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" viewBox="0 0 24 24" strokeWidth="2.5" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h1 className="text-2xl sm:text-3xl font-bold-display text-google-text mb-2">KARTU KEDALUWARSA</h1>
            <p className="text-xs sm:text-sm text-gray-600">Kartu ini telah kedaluwarsa. Silakan hubungi administrator untuk informasi lebih lanjut.</p>
          </div>
        </div>
      </div>
    );
  }
  
  // If already claimed, redirect to GMB
  if (link.isClaimed && link.urlGmb) {
    return (
      <div className="min-h-screen flex items-center justify-center bg-white px-4">
        <div className="w-full max-w-md animate-fade-up">
          <div className="card-solid p-6 sm:p-8 text-center">
            <div className="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 rounded-2xl mb-3 sm:mb-4 bg-google-green border-2 border-google-text shadow-google-sm">
              <svg className="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" viewBox="0 0 24 24" strokeWidth="2.5" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h1 className="text-2xl sm:text-3xl font-bold-display text-google-text mb-2">KARTU SUDAH AKTIF</h1>
            <p className="text-xs sm:text-sm text-gray-600 mb-4 sm:mb-6">Mengalihkan ke Google Maps...</p>
            <a
              href={link.urlGmb}
              className="btn-google-blue text-sm sm:text-base"
            >
              BUKA GOOGLE MAPS
            </a>
          </div>
        </div>
      </div>
    );
  }
  
  // Show activation form
  return <ActivationForm link={link} />;
}

export default function Page({ params }: PageProps) {
  return (
    <Suspense fallback={
      <div className="min-h-screen flex items-center justify-center bg-white">
        <div className="text-center">
          <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-google-blue mx-auto mb-4"></div>
          <p className="text-gray-600">Memuat...</p>
        </div>
      </div>
    }>
      <LinkData slug={params.slug} />
    </Suspense>
  );
}
