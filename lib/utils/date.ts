import { Timestamp } from 'firebase/firestore';

/**
 * Convert Firestore Timestamp or ISO string to Date object.
 */
export function toDate(value: Timestamp | string | Date | null | undefined): Date | null {
  if (!value) return null;
  if (value instanceof Date) return value;
  if (typeof value === 'string') return new Date(value);
  // Firestore Timestamp
  if (typeof value === 'object' && 'toDate' in value) {
    return value.toDate();
  }
  return null;
}
